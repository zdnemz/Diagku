<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title><?= $title ?? "Diagku" ?></title>
</head>

<body>

    <?php include __DIR__ . '/../../templates/header.php'; ?>

        <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-xl rounded-2xl border border-gray-100">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">🩺 Form Diagnosa</h2>

            <form method="post" action="/diagnosa" class="space-y-2">
                <?php foreach ($gejala as $g): ?>
                    <div
                        class="flex items-start gap-3 p-3 bg-gray-50 hover:bg-gray-100 rounded-lg border border-gray-200 transition">
                        <input type="checkbox" name="gejala[]" value="<?= $g['kode_gejala'] ?>"
                            id="g-<?= $g['kode_gejala'] ?>"
                            class="mt-1 w-5 h-5 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                        <label for="g-<?= $g['kode_gejala'] ?>" class="text-gray-700">
                            <?= $g['deskripsi'] ?>
                        </label>
                    </div>
                <?php endforeach; ?>

                <div class="pt-4 text-center">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition duration-200">
                        🔍 Diagnosa Sekarang
                    </button>
                </div>
            </form>
        </div>

    <?php include __DIR__ . '/../../templates/footer.php'; ?>

</body>

</html>