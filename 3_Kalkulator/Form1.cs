using System;
using System.Windows.Forms;

namespace KalkulatorPBKK {
    public partial class Form1 : Form {

        private Kalkulator kalkulator;
        public Form1() {
            InitializeComponent();
            kalkulator = new Kalkulator();
        }

        private bool AmbilAngka(out double angka1, out double angka2) {
            angka1 = 0;
            angka2 = 0;

            if (!double.TryParse(txtNilai1.Text, out angka1)) {
                MessageBox.Show(
                    "Nilai 1 harus berupa angka!",
                    "Error",
                    MessageBoxButtons.OK,
                    MessageBoxIcon.Error
                );
                return false;
            }

            if (!double.TryParse(txtNilai2.Text, out angka2)) {
                MessageBox.Show(
                    "Nilai 2 harus berupa angka!",
                    "Error",
                    MessageBoxButtons.OK,
                    MessageBoxIcon.Error
                );
                return false;
            }

            return true;
        }

        private void BtnTambah_Click(object sender, EventArgs e) {
            if (AmbilAngka(out double angka1, out double angka2)) {
                double hasil = kalkulator.Tambah(angka1, angka2);
                txtHasil.Text = hasil.ToString();
            }
        }

        private void BtnKurang_Click(object sender, EventArgs e) {
            if (AmbilAngka(out double angka1, out double angka2)) {
                double hasil = kalkulator.Kurang(angka1, angka2);
                txtHasil.Text = hasil.ToString();
            }
        }

        private void BtnKali_Click(object sender, EventArgs e) {
            if (AmbilAngka(out double angka1, out double angka2)) {
                double hasil = kalkulator.Kali(angka1, angka2);
                txtHasil.Text = hasil.ToString();
            }
        }

        private void BtnBagi_Click(object sender, EventArgs e) {
            if (AmbilAngka(out double angka1, out double angka2)) {
                try {
                    double hasil = kalkulator.Bagi(angka1, angka2);
                    txtHasil.Text = hasil.ToString();
                }
                catch (DivideByZeroException) {
                    MessageBox.Show(
                        "Tidak dapat membagi dengan 0!",
                        "Error",
                        MessageBoxButtons.OK,
                        MessageBoxIcon.Error
                    );
                }
            }
        }

        private void BtnClear_Click(object sender, EventArgs e){
            txtNilai1.Clear();
            txtNilai2.Clear();
            txtHasil.Clear();
            txtNilai1.Focus();
        }
    }
}