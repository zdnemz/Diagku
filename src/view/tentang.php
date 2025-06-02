<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title><?= $title ?? "Diagku" ?></title>
</head>

<body>
    <div class="min-h-screen bg-gradient-to-b from-white to-blue-50 flex items-center justify-center px-4 py-10">
        <div class="max-w-4xl w-full bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 text-center">ℹ️ Tentang Sistem</h1>

            <p class="text-gray-700 leading-relaxed mb-6 text-justify">
                Sistem ini merupakan <span class="font-semibold text-blue-600">Sistem Pakar Diagnosa Penyakit</span>
                yang dirancang untuk membantu pengguna dalam mendiagnosa penyakit berdasarkan gejala-gejala yang
                dialami.
                Sistem ini menggunakan metode <span class="font-semibold text-blue-600">Certainty Factor (CF)</span>,
                yaitu metode yang memperhitungkan tingkat keyakinan seorang pakar terhadap hubungan antara gejala dan
                penyakit.
            </p>

            <p class="text-gray-700 leading-relaxed mb-6 text-justify">
                Dengan memilih gejala yang sesuai, sistem akan menghitung kemungkinan penyakit yang dialami serta
                menampilkan persentase tingkat kepastian diagnosa. Hasil ini dapat menjadi acuan awal sebelum
                berkonsultasi langsung dengan tenaga medis profesional.
            </p>

            <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-2">✨ Fitur Utama:</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Diagnosa cepat berdasarkan input gejala</li>
                <li>Hasil dengan nilai kepastian (CF)</li>
                <li>Antarmuka modern dan responsif</li>
                <li>Dapat diakses melalui perangkat mobile dan desktop</li>
            </ul>

            <div class="mt-10 text-center">
                <a href="/"
                    class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition duration-200">
                    ⬅️ Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>

</html>