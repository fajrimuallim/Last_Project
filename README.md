<h1 align="center">📄 SuratDesa – Sistem Pembuatan Surat Otomatis di Kantor Desa</h1>

<p align="center">
  <img src="logo-desa.png" alt="Logo Kantor Desa" width="120"/>
</p>

<p align="center">
 <b>Kelas F</b><br>
 <b>M.Fajri Muallim</b><br>
 <b>D0222372</b>
</p>

<p align="center">
  <strong>Framework Web Based</strong><br>
  Program Studi Informatika<br>
  Fakultas Teknik<br>
  Universitas Sulawesi Barat<br>
  Majene, 2025
</p>

---

## 🎯 Role dan Fitur-fiturnya

### 1. Admin
- Melihat dan mengelola permohonan surat dari warga.
- Menyetujui atau menolak permintaan surat.
- Mencetak atau mengunduh surat dalam format PDF.
- Mengelola data pengguna dan sistem.

### 2. Pengguna (Warga)
- Mengajukan permintaan surat secara online.
- Mengisi form sesuai data yang dibutuhkan.
- Menunggu persetujuan dari admin.
- Mencetak atau mengunduh surat jika disetujui.

---

## 📨 Jenis Surat yang Didukung

- Surat Keterangan Domisili  
- Surat Pengantar Pembuatan KTP / KK  
- Surat Pengantar Pindah Domisili  
- Surat Keterangan Lahir  

---

## 🗂️ Struktur Tabel Database

### 1. Tabel `users`

| Nama Field | Tipe Data | Keterangan                    |
| ---------- | --------- | ----------------------------- |
| id         | INT, PK   | ID unik pengguna              |
| name       | VARCHAR   | Nama pengguna                 |
| email      | VARCHAR   | Email unik                    |
| password   | VARCHAR   | Kata sandi                    |
| role       | ENUM      | ['admin', 'user']             |
| created_at | TIMESTAMP | Tanggal dibuat                |

### 2. Tabel `surat_requests`

| Nama Field   | Tipe Data | Keterangan                                 |
| ------------ | --------- | ------------------------------------------ |
| id           | INT, PK   | ID permintaan surat                        |
| user_id      | INT       | FK ke `users`                              |
| surat_type   | ENUM      | ['domisili', 'ktpkk', 'pindah', 'lahir']   |
| status       | ENUM      | ['pending', 'approved', 'rejected']        |
| created_at   | TIMESTAMP | Tanggal permintaan                         |
| updated_at   | TIMESTAMP | Tanggal terakhir update status             |

### 3. Tabel `surat_data`

| Nama Field   | Tipe Data | Keterangan                          |
| ------------ | --------- | ----------------------------------- |
| id           | INT, PK   | ID data surat                       |
| request_id   | INT       | FK ke `surat_requests`              |
| field_name   | VARCHAR   | Nama kolom isian (ex: nama, NIK)    |
| field_value  | TEXT      | Nilai isian dari pengguna           |

---

## 🔁 Relasi Antar Tabel

- `users` ↔ `surat_requests` : One-to-Many  
- `surat_requests` ↔ `surat_data` : One-to-Many  

---

## 🔄 Alur Proses Pembuatan Surat

1. Pengguna login ke sistem.
2. Memilih jenis surat yang akan diajukan.
3. Mengisi formulir sesuai data yang diperlukan.
4. Mengirim permintaan surat (status: `pending`).
5. Admin memverifikasi dan menyetujui/tolak permintaan.
6. Jika disetujui, surat dapat diunduh dalam bentuk PDF.

---
