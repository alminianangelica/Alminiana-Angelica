<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f6fa; }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-md border-4 border-orange-500">
    <h2 class="text-2xl text-center text-blue-900 font-bold mb-6">Update Information</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      <div>
        <label class="block text-blue-900 mb-1 font-semibold">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="w-full px-4 py-3 border-2 border-orange-400 rounded-xl focus:ring-2 focus:ring-blue-500 shadow-sm">
      </div>

      <div>
        <label class="block text-blue-900 mb-1 font-semibold">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="w-full px-4 py-3 border-2 border-orange-400 rounded-xl focus:ring-2 focus:ring-blue-500 shadow-sm">
      </div>

      <div>
        <label class="block text-blue-900 mb-1 font-semibold">Email</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 border-2 border-orange-400 rounded-xl focus:ring-2 focus:ring-blue-500 shadow-sm">
      </div>

      <button type="submit"
              class="w-full bg-gradient-to-r from-blue-800 to-orange-600 text-white font-bold py-3 rounded-xl shadow-lg transition hover:scale-105">
         Update
      </button>
    </form>
  </div>
</body>
</html>
