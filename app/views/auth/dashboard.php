<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f6fa; }
    .nav-gradient { background: linear-gradient(90deg, #001F3F, #003366, #001F3F); }
    .table-header { background: linear-gradient(to right, #001F3F, #FF7A00); }
  </style>
</head>
<body class="min-h-screen">

  <nav class="nav-gradient shadow-lg border-b-4 border-orange-500">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-orange-400 text-2xl font-bold flex items-center gap-2">
        <i class="fa-solid fa-user-graduate"></i> Student Dashboard
      </h1>
    </div>
  </nav>

  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-xl rounded-xl p-6 border-4 border-orange-500">
      
      <form method="get" action="<?=site_url('/auth/dashboard')?>" class="mb-4 flex justify-end">
        <input 
          type="text" 
          name="q" 
          value="<?=html_escape($_GET['q'] ?? '')?>" 
          placeholder="Search student..." 
          class="px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500 w-64">
        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-r-lg shadow transition-all duration-300">
          <i class="fa fa-search"></i>
        </button>
      </form>

      <div class="overflow-x-auto rounded-xl border-4 border-orange-500">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="table-header text-white uppercase tracking-wider text-sm">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Lastname</th>
              <th class="py-3 px-4">Firstname</th>
              <th class="py-3 px-4">Email</th>
            </tr>
          </thead>
          <tbody class="text-gray-800 text-sm">
            <?php if(!empty($users)): ?>
              <?php foreach(html_escape($users) as $user): ?>
                <tr class="hover:bg-orange-100 transition duration-200">
                  <td class="py-3 px-4 font-medium"><?=($user['id']);?></td>
                  <td class="py-3 px-4"><?=($user['last_name']);?></td>
                  <td class="py-3 px-4"><?=($user['first_name']);?></td>
                  <td class="py-3 px-4"><?=($user['email']);?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="py-4 text-gray-500">No students found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="mt-4 flex justify-between items-center">
        <div class="pagination flex space-x-2 text-sm">
          <?php
            if (!empty($page)) {
              echo str_replace(['<a ', '<strong>', '</strong>'],
                ['<a class="hp-page text-blue-700 underline"', '<span class="hp-current font-bold text-orange-600">', '</span>'], $page);
            }
          ?>
        </div>

        <a href="<?=site_url('auth/logout');?>"
           class="bg-blue-900 hover:bg-blue-950 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
           <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
      </div>
    </div>
  </div>
</body>
</html>
