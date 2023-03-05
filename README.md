# Codeigniter 3 device detector by jaxid

Library Device Detector with CodeIgniter 3 adalah sebuah library yang dapat digunakan pada proyek CodeIgniter 3 untuk mendeteksi informasi perangkat yang digunakan oleh pengguna. Library ini mendukung PHP 8 sampai terbaru dan dapat membantu pengembang web untuk menyesuaikan tampilan dan fitur aplikasi mereka sesuai dengan perangkat yang digunakan oleh pengguna.

## Instalasi

1. Clone / download repo ini ke komputer Anda.
2. Pindah / copy file DeviceDetector.php ke direktori "application\libraries" proyek codeigniter anda.
3. buka "config/autoload" dan tambahkan.
<pre>
$autoload['libraries'] = array('devicedetector');
</pre>

## Penggunaan

1. Load library di controller anda seperti contoh dibawa ini :
<pre>
$this->load->library('DeviceDetector');
$detector = new DeviceDetector();
</pre>

2. ambil tipe device yang digunakan user untuk mengakses web kita
<pre>
$device_type = $detector->get_device_type();
</pre>

3. cara untuk menggunakan
<pre>
if ($detector->is_mobile()) {
	// yang ingin di tampilkan saat user menggunakan device mobile
} elseif ($detector->is_tablet()) {
	// yang ingin di tampilkan saat user menggunakan device Tablet
} else {
	// yang ingin di tampilkan saat user menggunakan device Dekstop
}
</pre>

## Contoh Simpel

contoh penggunaan basic pada class controller 
<pre>
public function index()
{
	$this->load->library('DeviceDetector');
	$detector = new DeviceDetector();

	$device_type = $detector->get_device_type();

	if ($detector->is_mobile()) {
		// yang ingin di tampilkan saat user menggunakan device mobile
	} elseif ($detector->is_tablet()) {
		// yang ingin di tampilkan saat user menggunakan device Tablet
	} else {
		// yang ingin di tampilkan saat user menggunakan device Dekstop
	}
}
</pre>

## Dukungan

Proyek ini mendukung CodeIgniter 3 dan PHP 8 atau versi yang lebih baru.

## Kontribusi

Kami mengundang kontribusi dari seluruh komunitas. Silakan lihat [CONTRIBUTING.md](CONTRIBUTING.md) untuk informasi lebih lanjut.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
