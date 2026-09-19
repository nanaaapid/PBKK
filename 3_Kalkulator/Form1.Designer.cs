using System.Drawing;
using System.Windows.Forms;

namespace KalkulatorPBKK {
    partial class Form1 {
        private System.ComponentModel.IContainer components = null;
        private Label lblJudul;
        private Label lblNilai1;
        private Label lblNilai2;
        private Label lblHasil;
        private TextBox txtNilai1;
        private TextBox txtNilai2;
        private TextBox txtHasil;
        private Button btnTambah;
        private Button btnKurang;
        private Button btnKali;
        private Button btnBagi;
        private Button btnClear;

        protected override void Dispose(bool disposing) {
            if (disposing && (components != null)) components.Dispose();
            base.Dispose(disposing);
        }

        private void InitializeComponent()
        {
            this.lblJudul = new Label();
            this.lblNilai1 = new Label();
            this.lblNilai2 = new Label();
            this.lblHasil = new Label();
            this.txtNilai1 = new TextBox();
            this.txtNilai2 = new TextBox();
            this.txtHasil = new TextBox();
            this.btnTambah = new Button();
            this.btnKurang = new Button();
            this.btnKali = new Button();
            this.btnBagi = new Button();
            this.btnClear = new Button();
            this.SuspendLayout();

            // FORM
            this.AutoScaleDimensions = new SizeF(7F, 15F);
            this.AutoScaleMode = AutoScaleMode.Font;
            this.ClientSize = new Size(400, 400);
            this.FormBorderStyle = FormBorderStyle.FixedSingle;
            this.MaximizeBox = false;
            this.StartPosition = FormStartPosition.CenterScreen;
            this.Text = "Kalkulator Sederhana";

            // JUDUL
            this.lblJudul.AutoSize = true;
            this.lblJudul.Font =
                new Font(
                    "Segoe UI",
                    16F,
                    FontStyle.Bold
                );

            this.lblJudul.Location = new Point(105, 25);
            this.lblJudul.Text = "KALKULATOR";

            // LABEL NILAI 1
            this.lblNilai1.AutoSize = true;
            this.lblNilai1.Location = new Point(50, 85);
            this.lblNilai1.Text = "Nilai 1 :";

            // TEXTBOX NILAI 1
            this.txtNilai1.Location = new Point(130, 82);
            this.txtNilai1.Size = new Size(200, 23);

            // LABEL NILAI 2
            this.lblNilai2.AutoSize = true;
            this.lblNilai2.Location = new Point(50, 125);
            this.lblNilai2.Text = "Nilai 2 :";

            // TEXTBOX NILAI 2
            this.txtNilai2.Location = new Point(130, 122);
            this.txtNilai2.Size = new Size(200, 23);

            // LABEL HASIL
            this.lblHasil.AutoSize = true;
            this.lblHasil.Location = new Point(50, 165);
            this.lblHasil.Text = "Hasil :";

            // TEXTBOX HASIL
            this.txtHasil.Location = new Point(130, 162);
            this.txtHasil.Size = new Size(200, 23);
            this.txtHasil.ReadOnly = true;

            // BUTTON TAMBAH
            this.btnTambah.Location = new Point(50, 220);
            this.btnTambah.Size = new Size(60, 45);
            this.btnTambah.Text = "+";
            this.btnTambah.UseVisualStyleBackColor = true;
            this.btnTambah.Click += new System.EventHandler(this.BtnTambah_Click);

            // BUTTON KURANG
            this.btnKurang.Location = new Point(120, 220);
            this.btnKurang.Size = new Size(60, 45);
            this.btnKurang.Text = "-";
            this.btnKurang.UseVisualStyleBackColor = true;
            this.btnKurang.Click += new System.EventHandler(this.BtnKurang_Click);

            // BUTTON KALI
            this.btnKali.Location = new Point(190, 220);
            this.btnKali.Size = new Size(60, 45);
            this.btnKali.Text = "×";
            this.btnKali.UseVisualStyleBackColor = true;
            this.btnKali.Click += new System.EventHandler(this.BtnKali_Click);

            // BUTTON BAGI
            this.btnBagi.Location = new Point(260, 220);
            this.btnBagi.Size = new Size(60, 45);
            this.btnBagi.Text = "÷";
            this.btnBagi.UseVisualStyleBackColor = true;
            this.btnBagi.Click += new System.EventHandler(this.BtnBagi_Click);

            // BUTTON CLEAR
            this.btnClear.Location = new Point(130, 290);
            this.btnClear.Size = new Size(120, 40);
            this.btnClear.Text = "CLEAR";
            this.btnClear.UseVisualStyleBackColor = true;
            this.btnClear.Click += new System.EventHandler(this.BtnClear_Click);

            // ADD CONTROLS
            this.Controls.Add(this.lblJudul);
            this.Controls.Add(this.lblNilai1);
            this.Controls.Add(this.txtNilai1);
            this.Controls.Add(this.lblNilai2);
            this.Controls.Add(this.txtNilai2);
            this.Controls.Add(this.lblHasil);
            this.Controls.Add(this.txtHasil);
            this.Controls.Add(this.btnTambah);
            this.Controls.Add(this.btnKurang);
            this.Controls.Add(this.btnKali);
            this.Controls.Add(this.btnBagi);
            this.Controls.Add(this.btnClear);
            this.ResumeLayout(false);
            this.PerformLayout();
        }
    }
}