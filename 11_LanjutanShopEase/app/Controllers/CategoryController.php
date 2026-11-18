<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    // READ
    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();

        return view('admin/categories/index', $data);
    }

    // CREATE FORM
    public function create()
    {
        return view('admin/categories/create');
    }

    // STORE
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'description' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $name = trim($this->request->getPost('name'));

        $slug = url_title($name, '-', true);

        $this->categoryModel->insert([
            'name' => $name,
            'slug' => $slug,
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category successfully added.');
    }

    // EDIT FORM
    public function edit($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Category not found.');
        }

        return view('admin/categories/edit', [
            'category' => $category
        ]);
    }

    // UPDATE
    public function update($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Category not found.');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'description' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $name = trim($this->request->getPost('name'));

        $this->categoryModel->update($id, [
            'name' => $name,
            'slug' => url_title($name, '-', true),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category successfully updated.');
    }

    // DELETE
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Category not found.');
        }

        $productModel = new ProductModel();

        $productExists = $productModel
            ->where('category_id', $id)
            ->countAllResults();

        if ($productExists > 0) {
            return redirect()->to('/admin/categories')
                ->with(
                    'error',
                    'Category cannot be deleted because it still has products.'
                );
        }

        $this->categoryModel->delete($id);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category successfully deleted.');
    }
}