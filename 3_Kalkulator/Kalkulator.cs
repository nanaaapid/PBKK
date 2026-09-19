using System;

namespace KalkulatorPBKK {
    public class Kalkulator {
        
        public double Tambah(double angka1, double angka2) {return angka1 + angka2;}
        public double Kurang(double angka1, double angka2) {return angka1 - angka2;}
        public double Kali(double angka1, double angka2) {return angka1 * angka2;}
        
        public double Bagi(double angka1, double angka2) {
            if (angka2 == 0) { throw new DivideByZeroException(); }
            return angka1 / angka2;
        }
    }
}