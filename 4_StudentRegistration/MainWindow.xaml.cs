using System;
using System.Collections.ObjectModel;
using System.Linq;
using System.Windows;
using System.Windows.Controls;

namespace StudentRegistration
{
    public partial class MainWindow : Window
    {
        private ObservableCollection<Student> students = new();
        private Student? selectedStudent;

        public MainWindow()
        {
            InitializeComponent();
            dataGridMahasiswa.ItemsSource = students;
            dpTanggalLahir.SelectedDate = DateTime.Today;
        }

        private void BtnSimpan_Click(object sender, RoutedEventArgs e)
        {
            if (!ValidateInput()) return;

            string nim = txtNIM.Text.Trim();

            if (students.Any(s => s.NIM.Equals(nim, StringComparison.OrdinalIgnoreCase)))
            {
                MessageBox.Show("NIM sudah terdaftar!", "Peringatan");
                return;
            }

            Student student = new()
            {
                NIM = nim,
                Nama = txtNama.Text.Trim(),
                Prodi = ((ComboBoxItem)cmbProdi.SelectedItem).Content?.ToString() ?? "",
                JenisKelamin = rbLaki.IsChecked == true ? "Laki-laki" : "Perempuan",
                TanggalLahir = dpTanggalLahir.SelectedDate?.ToString("dd-MM-yyyy") ?? "",
                Alamat = txtAlamat.Text.Trim(),
                NoTelepon = txtTelepon.Text.Trim()
            };

            students.Add(student);

            MessageBox.Show("Data mahasiswa berhasil disimpan!", "Berhasil");
            ResetForm();
        }

        private void BtnEdit_Click(object sender, RoutedEventArgs e)
        {
            if (selectedStudent == null)
            {
                MessageBox.Show("Pilih data mahasiswa terlebih dahulu!", "Peringatan");
                return;
            }

            if (!ValidateInput()) return;

            selectedStudent.NIM = txtNIM.Text.Trim();
            selectedStudent.Nama = txtNama.Text.Trim();
            selectedStudent.Prodi = ((ComboBoxItem)cmbProdi.SelectedItem).Content?.ToString() ?? "";
            selectedStudent.JenisKelamin = rbLaki.IsChecked == true ? "Laki-laki" : "Perempuan";
            selectedStudent.TanggalLahir = dpTanggalLahir.SelectedDate?.ToString("dd-MM-yyyy") ?? "";
            selectedStudent.Alamat = txtAlamat.Text.Trim();
            selectedStudent.NoTelepon = txtTelepon.Text.Trim();

            dataGridMahasiswa.Items.Refresh();

            MessageBox.Show("Data berhasil diperbarui!", "Berhasil");
            ResetForm();
        }

        private void BtnHapus_Click(object sender, RoutedEventArgs e)
        {
            if (selectedStudent == null)
            {
                MessageBox.Show("Pilih data yang ingin dihapus!", "Peringatan");
                return;
            }

            MessageBoxResult result = MessageBox.Show(
                "Yakin ingin menghapus data ini?",
                "Konfirmasi",
                MessageBoxButton.YesNo);

            if (result == MessageBoxResult.Yes)
            {
                students.Remove(selectedStudent);
                MessageBox.Show("Data berhasil dihapus!", "Berhasil");
                ResetForm();
            }
        }

        private void BtnReset_Click(object sender, RoutedEventArgs e) => ResetForm();

        private void ResetForm()
        {
            txtNIM.Clear();
            txtNama.Clear();
            cmbProdi.SelectedIndex = -1;
            rbLaki.IsChecked = false;
            rbPerempuan.IsChecked = false;
            dpTanggalLahir.SelectedDate = DateTime.Today;
            txtAlamat.Clear();
            txtTelepon.Clear();
            selectedStudent = null;
            dataGridMahasiswa.SelectedItem = null;
            txtNIM.Focus();
        }

        private void BtnCari_Click(object sender, RoutedEventArgs e)
        {
            string nim = txtSearch.Text.Trim();

            if (string.IsNullOrEmpty(nim))
            {
                MessageBox.Show("Masukkan NIM terlebih dahulu.", "Peringatan");
                return;
            }

            Student? student = students.FirstOrDefault(s => s.NIM.Equals(nim, StringComparison.OrdinalIgnoreCase));

            if (student != null)
            {
                dataGridMahasiswa.SelectedItem = student;
                dataGridMahasiswa.ScrollIntoView(student);
                MessageBox.Show($"Data mahasiswa ditemukan:\n\nNIM: {student.NIM}\nNama: {student.Nama}\nProdi: {student.Prodi}", "Data Ditemukan");
            }
            else
                MessageBox.Show("Mahasiswa dengan NIM tersebut tidak ditemukan.", "Data Tidak Ditemukan");
        }

        private bool ValidateInput()
        {
            if (string.IsNullOrWhiteSpace(txtNIM.Text))
            {
                MessageBox.Show("NIM harus diisi!");
                txtNIM.Focus();
                return false;
            }

            if (string.IsNullOrWhiteSpace(txtNama.Text))
            {
                MessageBox.Show("Nama harus diisi!");
                txtNama.Focus();
                return false;
            }

            if (cmbProdi.SelectedItem == null)
            {
                MessageBox.Show("Program studi harus dipilih!");
                return false;
            }

            if (rbLaki.IsChecked != true && rbPerempuan.IsChecked != true)
            {
                MessageBox.Show("Jenis kelamin harus dipilih!");
                return false;
            }

            if (string.IsNullOrWhiteSpace(txtAlamat.Text))
            {
                MessageBox.Show("Alamat harus diisi!");
                return false;
            }

            if (string.IsNullOrWhiteSpace(txtTelepon.Text))
            {
                MessageBox.Show("Nomor telepon harus diisi!");
                return false;
            }

            return true;
        }

        private void DataGridMahasiswa_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if (dataGridMahasiswa.SelectedItem is not Student student) return;

            selectedStudent = student;

            txtNIM.Text = student.NIM;
            txtNama.Text = student.Nama;

            foreach (ComboBoxItem item in cmbProdi.Items)
            {
                if (item.Content?.ToString() == student.Prodi)
                {
                    cmbProdi.SelectedItem = item;
                    break;
                }
            }

            rbLaki.IsChecked = student.JenisKelamin == "Laki-laki";
            rbPerempuan.IsChecked = student.JenisKelamin == "Perempuan";

            if (DateTime.TryParseExact(
                student.TanggalLahir,
                "dd-MM-yyyy",
                null,
                System.Globalization.DateTimeStyles.None,
                out DateTime tanggal))
            {
                dpTanggalLahir.SelectedDate = tanggal;
            }

            txtAlamat.Text = student.Alamat;
            txtTelepon.Text = student.NoTelepon;
        }
    }
}