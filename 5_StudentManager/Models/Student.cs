using System.ComponentModel;
using System.Runtime.CompilerServices;

namespace StudentManager.Models;

public class Student : INotifyPropertyChanged
{
    private string _nim = "";
    private string _nama = "";
    private string _jurusan = "";
    private string _gender = "";
    private string _email = "";

    public int Id { get; set; }

    public string NIM { get => _nim; set { _nim = value; OnPropertyChanged(); } }
    public string Nama { get => _nama; set { _nama = value; OnPropertyChanged(); } }
    public string Jurusan { get => _jurusan; set { _jurusan = value; OnPropertyChanged(); } }
    public string Gender { get => _gender; set { _gender = value; OnPropertyChanged(); } }
    public string Email { get => _email; set { _email = value; OnPropertyChanged(); } }

    public event PropertyChangedEventHandler? PropertyChanged;

    private void OnPropertyChanged([CallerMemberName] string? name = null) =>
        PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
}