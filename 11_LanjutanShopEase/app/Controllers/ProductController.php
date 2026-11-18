<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    // READ
    public function index()
    {
        $products = $this->productModel
            ->select('products.*, categories.name AS category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();

        return view('admin/products/index', [
            'products' => $products
        ]);
    }

    // CREATE FORM
    public function create()
    {
        return view('admin/products/create', [
            'categories' => $this->categoryModel->findAll()
        ]);
    }

    // STORE
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[150]',
            'category_id' => 'required|integer',
            'price' => 'required|decimal|greater_than_equal_to[0]',
            'stock' => 'required|integer|greater_than_equal_to[0]',
            'description' => 'permit_empty',
            'status' => 'required|in_list[active,inactive]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $category = $this->categoryModel->find(
            $this->request->getPost('category_id')
        );

        if (!$category) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid category selected.');
        }

        $imageName = $this->uploadImage();

        if ($imageName === false) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Image upload failed.');
        }

        $this->productModel->insert([
            'category_id' => $category['id'],
            'name' => trim($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $imageName,
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product successfully added.');
    }

    // EDIT FORM
    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Product not found.');
        }

        return view('admin/products/edit', [
            'product' => $product,
            'categories' => $this->categoryModel->findAll()
        ]);
    }

    // UPDATE
    public function update($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Product not found.');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[150]',
            'category_id' => 'required|integer',
            'price' => 'required|decimal|greater_than_equal_to[0]',
            'stock' => 'required|integer|greater_than_equal_to[0]',
            'description' => 'permit_empty',
            'status' => 'required|in_list[active,inactive]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $category = $this->categoryModel->find(
            $this->request->getPost('category_id')
        );

        if (!$category) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid category selected.');
        }

        $imageName = $product['image'];

        $newImage = $this->uploadImage();

        if ($newImage === false) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Image upload failed.');
        }

        if ($newImage !== null) {
            if ($imageName) {
                $oldImagePath = FCPATH . 'uploads/products/' . $imageName;

                if (is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = $newImage;
        }

        $this->productModel->update($id, [
            'category_id' => $category['id'],
            'name' => trim($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $imageName,
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product successfully updated.');
    }

    // DELETE
    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Product not found.');
        }

        if ($product['image']) {
            $imagePath = FCPATH . 'uploads/products/' . $product['image'];

            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        $this->productModel->delete($id);

        return redirect()->to('/admin/products')
            ->with('success', 'Product successfully deleted.');
    }

    // IMAGE UPLOAD
    private function uploadImage()
    {
        $image = $this->request->getFile('image');

        if (!$image || $image->getError() === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (!$image->isValid() || $image->hasMoved()) {
            return false;
        }

        $allowedMimeTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!in_array($image->getMimeType(), $allowedMimeTypes)) {
            return false;
        }

        if ($image->getSizeByUnit('mb') > 2) {
            return false;
        }

        $uploadPath = FCPATH . 'uploads/products/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageName = $image->getRandomName();

        $image->move($uploadPath, $imageName);

        return $imageName;
    }
}