using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Runtime.CompilerServices;
using System.Windows;
using System.Windows.Input;
using StudentManager.Data;
using StudentManager.Models;

namespace StudentManager.ViewModels;

public class StudentViewModel : INotifyPropertyChanged
{
    private readonly StudentRepository _repository;
    private Student? _selectedStudent;
    private string _searchText = "";

    public ObservableCollection<Student> Students { get; } = new();

    public Student? SelectedStudent
    {
        get => _selectedStudent;
        set { _selectedStudent = value; OnPropertyChanged(); }
    }

    public string SearchText
    {
        get => _searchText;
        set { _searchText = value; OnPropertyChanged(); }
    }

    public int TotalStudents => Students.Count;
    public int TotalInformatika => Students.Count(x => x.Jurusan == "Informatika");
    public int TotalSistemInformasi => Students.Count(x => x.Jurusan == "Sistem Informasi");
    public int TotalLakiLaki => Students.Count(x => x.Gender == "Laki-laki");
    public int TotalPerempuan => Students.Count(x => x.Gender == "Perempuan");

    public ICommand SaveCommand { get; }
    public ICommand DeleteCommand { get; }
    public ICommand ResetCommand { get; }
    public ICommand SearchCommand { get; }

    public StudentViewModel()
    {
        _repository = new StudentRepository();

        SaveCommand = new RelayCommand(Save);
        DeleteCommand = new RelayCommand(Delete);
        ResetCommand = new RelayCommand(Reset);
        SearchCommand = new RelayCommand(Search);

        LoadData();
        Reset();
    }

    private void LoadData()
    {
        try
        {
            Students.Clear();

            foreach (var student in _repository.GetAll())
                Students.Add(student);

            RefreshStatistics();
        }
        catch (Exception ex)
        {
            MessageBox.Show("Gagal mengambil data:\n" + ex.Message, "Database Error");
        }
    }

    private void Save()
    {
        if (SelectedStudent == null) return;

        if (string.IsNullOrWhiteSpace(SelectedStudent.NIM) ||
            string.IsNullOrWhiteSpace(SelectedStudent.Nama) ||
            string.IsNullOrWhiteSpace(SelectedStudent.Jurusan) ||
            string.IsNullOrWhiteSpace(SelectedStudent.Gender))
        {
            MessageBox.Show("Data mahasiswa belum lengkap!", "Peringatan");
            return;
        }

        try
        {
            if (SelectedStudent.Id == 0)
            {
                _repository.Insert(SelectedStudent);
                MessageBox.Show("Data mahasiswa berhasil ditambahkan!", "Berhasil");
            }
            else
            {
                _repository.Update(SelectedStudent);
                MessageBox.Show("Data mahasiswa berhasil diperbarui!", "Berhasil");
            }

            LoadData();
            Reset();
        }
        catch (Exception ex)
        {
            MessageBox.Show("Gagal menyimpan data:\n" + ex.Message, "Database Error");
        }
    }

    private void Delete()
    {
        if (SelectedStudent == null || SelectedStudent.Id == 0)
        {
            MessageBox.Show("Pilih data yang ingin dihapus!", "Peringatan");
            return;
        }

        var result = MessageBox.Show(
            $"Yakin ingin menghapus {SelectedStudent.Nama}?",
            "Konfirmasi",
            MessageBoxButton.YesNo);

        if (result != MessageBoxResult.Yes) return;

        try
        {
            _repository.Delete(SelectedStudent.Id);
            MessageBox.Show("Data berhasil dihapus!", "Berhasil");
            LoadData();
            Reset();
        }
        catch (Exception ex)
        {
            MessageBox.Show("Gagal menghapus data:\n" + ex.Message, "Database Error");
        }
    }

    private void Search()
    {
        try
        {
            var result = string.IsNullOrWhiteSpace(SearchText)
                ? _repository.GetAll()
                : _repository.Search(SearchText);

            Students.Clear();

            foreach (var student in result)
                Students.Add(student);

            RefreshStatistics();
        }
        catch (Exception ex)
        {
            MessageBox.Show("Gagal melakukan pencarian:\n" + ex.Message, "Database Error");
        }
    }

    private void Reset()
    {
        SelectedStudent = new Student();
    }

    private void RefreshStatistics()
    {
        OnPropertyChanged(nameof(TotalStudents));
        OnPropertyChanged(nameof(TotalInformatika));
        OnPropertyChanged(nameof(TotalSistemInformasi));
        OnPropertyChanged(nameof(TotalLakiLaki));
        OnPropertyChanged(nameof(TotalPerempuan));
    }

    public event PropertyChangedEventHandler? PropertyChanged;

    private void OnPropertyChanged([CallerMemberName] string? name = null) =>
        PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
}