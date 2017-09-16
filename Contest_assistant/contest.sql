-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 11:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contest`
--

-- --------------------------------------------------------

--
-- Table structure for table `contest_lists`
--

CREATE TABLE `contest_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberofproblems` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contest_lists`
--

INSERT INTO `contest_lists` (`id`, `name`, `date`, `numberofproblems`, `created_at`, `updated_at`) VALUES
(2, 'Contest 1', '2017-09-12', '8', '2017-09-13 01:50:56', '2017-09-13 01:50:56'),
(3, 'Contest 2', '2017-09-14', '10', '2017-09-13 01:51:17', '2017-09-13 01:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `editorials`
--

CREATE TABLE `editorials` (
  `id` int(10) UNSIGNED NOT NULL,
  `contest_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorial_body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `editorials`
--

INSERT INTO `editorials` (`id`, `contest_id`, `editorial_body`, `created_at`, `updated_at`) VALUES
(1, '2', 'Hi!\r\n\r\nI\'m honored to invite you to Codeforces Round #432, it will be held on 4th September 14:35 UTC. There will be 5 problems for each division, as usual, you have 2:30 to solve the problems. The contest was prepared by Lewin Lewin Gan, Artsem Arterm Zhuk and me.\r\nThe IndiaHacks Final Round will be held on 3rd September 12:30. Finalist must not discuss the problems after their contest.\r\nThe stories of my problems will be about Arpa, although in one problem you\'ll see Mojtaba Moji FayazBakhsh, my great teacher.\r\nI\'d like to thank Lewin, Artsem and myself (:P) at first, then Konstantin zemen Semenov and white2302 for testing the problems, Nikolay KAN Kalinin for helping us in moving the contest to codeforces and Mike MikeMirzayanov Mirzayanov for the great Codeforces and Polygon platforms.\r\nThe scoring distribution will be announced later.\r\nObviously, if you are interested in if the round is rated or not, ask in comments and get a lot of down votes.\r\nUPD. There will be 5 problems for div.2 and 6 problems for div.1.\r\nUPD2. Scoring Distribution: div.1: 500-1000-1250-1750-2000-2500, div.2: 500-1000-1500-2000-2500.\r\nUPD3. Editorial is partially ready. I\'ll complete it soon.\r\nCongratulations to winners:\r\nDiv.1:\r\n1 . AngryBacon\r\n2 . dreamoon\r\n3 . sd0061\r\n4 . W4yneb0t\r\n5 . Um_nik\r\nDiv.2:\r\n1 . miaom\r\n2 . fzzzq2002\r\n3 . igoodvegetableb\r\n4 . _Lucas97 and Szymanski_w (WoW !!)', '2017-09-13 02:01:29', '2017-09-13 02:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `judges_input_outputs`
--

CREATE TABLE `judges_input_outputs` (
  `id` int(10) UNSIGNED NOT NULL,
  `contest_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_output_body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judges_input_outputs`
--

INSERT INTO `judges_input_outputs` (`id`, `contest_id`, `problem_id`, `input_output_body`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '605293 606510\r\n956739 956006                                    \r\n826611 825983\r\n756134 756776\r\n478642 479101\r\n815892 815933\r\n719220 719135\r\n929349 929040\r\n948351 948681\r\n491808 491202                                      \r\n504516 507852\r\n604712 604712\r\n436809 436182            \r\n630804 630542\r\n975948 975688\r\n945718 945752\r\n747700 747747\r\n652581 653137\r\n824003 823974\r\n655077 655161\r\n567537 567893\r\n851101 851038\r\n524621 524569\r\n549210 549073\r\n782205 782263\r\n422252 422691\r\n285142 285524\r\n478472 479285\r\n485461 484957\r\n748121 748121\r\n823874 824088\r\n359661 358904\r\n388654 388444\r\n981428 981459\r\n830977 832487\r\n654572 654612\r\n240125 241624\r\n532347 536933\r\n545105 545167\r\n850670 851113', '2017-09-13 02:08:02', '2017-09-13 02:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `judges_solutions`
--

CREATE TABLE `judges_solutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `contest_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution_body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judges_solutions`
--

INSERT INTO `judges_solutions` (`id`, `contest_id`, `problem_id`, `solution_body`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '#include <bits/stdc++.h>\r\nusing namespace std;\r\n\r\ntypedef pair<int, int> pii;\r\ntypedef long long ll;\r\ntypedef vector<int> vi;\r\n\r\n#define pb push_back\r\n#define eb emplace_back\r\n#define mp make_pair\r\n#define fi first\r\n#define se second\r\n#define rep(i,n) rep2(i,0,n)\r\n#define rep2(i,m,n) for(int i=m;i<(n);i++)\r\n#define ALL(c) (c).begin(),(c).end()\r\n\r\nint TC;\r\nint n;\r\nint a[110];\r\nbool f[1000010];\r\nbool ng[1000010];\r\nint b[110];\r\n\r\nvoid solve()\r\n{\r\n	memset(f, 0, sizeof(f));\r\n	memset(ng, 0, sizeof(ng));\r\n\r\n	scanf(\"%d\", &n);\r\n	rep(i, n) scanf(\"%d\", &a[i]);\r\n	sort(a, a + n);\r\n\r\n	vi ban;\r\n\r\n	rep(i, n) {\r\n		rep(j, i) {\r\n			ban.pb(a[i] - a[j]);\r\n			f[a[i] - a[j]] = 1;\r\n		}\r\n	}\r\n\r\n	b[0] = 1;\r\n\r\n	for (int i = 1; i < n; ++i) {\r\n		for (int x : ban) {\r\n			if (b[i-1] + x <= 1000000) ng[b[i-1] + x] = 1;\r\n		}\r\n\r\n		int x = b[i-1] + 1;\r\n		while (ng[x] && x <= 1000000) ++x;\r\n		b[i] = x;\r\n	}\r\n\r\n	assert(b[n-1] <= 1000000);\r\n	puts(\"YES\");\r\n	rep(i, n) printf(\"%d%c\", b[i], i == n - 1 ? \'\\n\' : \' \');\r\n}\r\n\r\nint main() {\r\n	scanf(\"%d\", &TC);\r\n	while (TC--) solve();\r\n	return 0;\r\n}', '2017-09-13 02:08:49', '2017-09-13 02:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2017_07_13_162103_create_contests_table', 1),
(18, '2017_07_13_215349_create_models_table', 1),
(19, '2017_07_13_223133_create_lists_table', 1),
(29, '2017_07_13_230051_create_contest_lists_table', 2),
(30, '2017_07_18_234733_create_problem_sets_table', 2),
(31, '2017_07_23_004541_create_solutions_table', 2),
(32, '2017_09_11_234504_create_judges_input_outputs_table', 2),
(33, '2017_09_12_013919_create_editorials_table', 2),
(34, '2017_09_12_173606_create_judges_solutions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problem_sets`
--

CREATE TABLE `problem_sets` (
  `id` int(10) UNSIGNED NOT NULL,
  `contest_id` int(11) NOT NULL,
  `problem_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problem_sets`
--

INSERT INTO `problem_sets` (`id`, `contest_id`, `problem_name`, `pdf_file_path`, `created_at`, `updated_at`) VALUES
(1, 2, 'Set Theory', '/storage/problem_sets/Chapter 1_Foundations.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(2, 2, 'Similar Words', '/storage/problem_sets/Stallings_Chapter 15_Electric Mail Security.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(3, 2, 'Eleventh Birthday', '/storage/problem_sets/Stallings_Chapter 10_Key Management; Other public-key Cryptosystem.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(4, 2, 'Masha and Cactus', '/storage/problem_sets/Chapter 2_Protocol Building Block.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(5, 2, 'Satellites', '/storage/problem_sets/Chapter 8_Key Management.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(6, 2, 'To Play or not to Play', '/storage/problem_sets/Chapter 20_Public Key Digital Signature Algorithm.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(7, 2, 'Maxim Buys an Apartment', '/storage/problem_sets/Chapter 14_Still Other Block Cipher.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58'),
(8, 2, 'Jury Meeting', '/storage/problem_sets/Chapter 19_Public Key Algorithm.pdf', '2017-09-13 01:59:58', '2017-09-13 01:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `problem_sets_id` int(11) NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `problem_sets_id`, `author`, `solution`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maruf', '#include <iostream>\r\n#include <algorithm>\r\n#include <vector>\r\nusing namespace std;\r\nconst int MAX = 1000000;\r\nbool mark[MAX * 2 + 10];\r\nint a[1000];\r\nint main()\r\n{\r\n	ios::sync_with_stdio(false);\r\n	cin.tie(0);\r\n	int t;\r\n	cin >> t;\r\n	while (t--)\r\n	{\r\n		int n;\r\n		cin >> n;\r\n		for (int i = 0; i < n; i++)\r\n			cin >> a[i];\r\n		sort(a, a + n);\r\n		vector<int> ans;\r\n		for (int i = MAX; i >= 0; i--)\r\n		{\r\n			bool valid = true;\r\n			for (int j = 0; j < n; j++)\r\n				if (mark[a[j] + i])\r\n				{\r\n					valid = false;\r\n					break;\r\n				}\r\n			if (valid)\r\n			{\r\n				for (int j = 0; j < n; j++)\r\n					mark[a[j] + i] = true;\r\n				ans.push_back(i);\r\n				if (ans.size() == n)\r\n					break;\r\n			}\r\n		}\r\n		cout << \"YES\\n\";\r\n		for (int i = 0; i < n; i++)\r\n			cout << ans[i] << \" \";\r\n		cout << \"\\n\";\r\n		for (int i = 0; i < n; i++)\r\n			for (int j = 0; j < n; j++)\r\n				mark[a[i] + ans[j]] = false;\r\n	}\r\n	return 0;\r\n}', '2017-09-13 02:09:44', '2017-09-13 02:09:44'),
(2, 1, 'zilani', '#include <cstdio>\r\n#include <iostream>\r\n#include <algorithm>\r\n#include <cstring>\r\n#include <string>\r\n#include <vector>\r\n#include <set>\r\n#include <map>\r\n#include <utility>\r\n#include <cstdlib>\r\n#include <memory>\r\n#include <queue>\r\n#include <cassert>\r\n#include <cmath>\r\n#include <ctime>\r\n#include <complex>\r\n#include <bitset>\r\n#include <fstream>\r\n#include <unordered_map>\r\n#include <unordered_set>\r\n#include <numeric>\r\n\r\nusing namespace std;\r\n\r\n#define ws ws_____________________\r\n#define y1 y1_____________________\r\n#define y0 y0_____________________\r\n#define left left_________________\r\n#define right right_______________\r\n#define next next_________________\r\n#define prev prev_________________\r\n#define hash hash_________________\r\n\r\n#define pb push_back\r\n#define fst first\r\n#define snd second\r\n#define mp make_pair \r\n#define sz(C) ((int) (C).size())\r\n#define forn(i, n) for (int i = 0; i < int(n); ++i)\r\n#define ford(i, n) for (int i = int(n) - 1; i >= 0; --i)\r\n#define all(C) begin(C), end(C)\r\n\r\ntypedef long long ll;\r\ntypedef unsigned long long ull;\r\ntypedef unsigned int uint;\r\ntypedef pair<int,int> pii;\r\ntypedef pair<ll, ll> pll;\r\ntypedef vector<ll> vll;\r\ntypedef vector<int> vi;\r\ntypedef vector<vi> vvi;\r\ntypedef vector<pii> vii;\r\ntypedef long double ld;\r\ntypedef complex<double> cd;\r\n\r\n#ifdef LOCAL\r\n#define eprintf(args...) fprintf(stderr, args), fflush(stderr)\r\n#else\r\n#define eprintf(...) ;\r\n#endif\r\n\r\n#define FILE_NAME \"a\"\r\n\r\nconst int MAX = 1e6;\r\n\r\nint n;\r\nvi a;\r\n\r\nbool read() {\r\n	if  (scanf(\"%d\", &n) < 1) {\r\n		return 0;\r\n	}\r\n	a.resize(n);\r\n	forn(i, n) {\r\n		scanf(\"%d\", &a[i]);\r\n	}\r\n	return 1;\r\n}\r\n\r\nbool bad[MAX];\r\n\r\nbool solve() {\r\n	sort(all(a));\r\n	const int mx = a.back();\r\n\r\n	memset (bad, 0, sizeof(bool) * mx);\r\n	forn(i, n) {\r\n		forn(j, i) {\r\n			bad[abs(a[i] - a[j])] = 1;\r\n		}\r\n	}\r\n\r\n	vi b(n);\r\n	int ptr = 0;\r\n	for (int x = 1; x <= MAX && ptr < n; ++x) {\r\n		bool good = 1;\r\n		forn(i, ptr) {\r\n			const int diff = x - b[i];\r\n			if  (diff < mx && bad[diff]) {\r\n				good = 0;\r\n				break;\r\n			}\r\n		}\r\n\r\n		if  (good) {\r\n			b[ptr++] = x;\r\n		}\r\n	}\r\n\r\n	if  (ptr < n) {\r\n		return 0;\r\n	}\r\n\r\n	puts(\"YES\");\r\n	forn(i, n) {\r\n		printf(\"%d \", b[i]);\r\n	}\r\n	puts(\"\");\r\n	return 1;\r\n}\r\n\r\nint main() {\r\n#ifdef LOCAL\r\n	freopen(FILE_NAME \".in\", \"r\", stdin);\r\n	// freopen(FILE_NAME \".out\", \"w\", stdout);\r\n#endif\r\n\r\n	int T;\r\n	scanf(\"%d\", &T);\r\n	forn(t, T) {\r\n		assert(read());\r\n\r\n		if  (!solve()) {\r\n			puts(\"NO\");\r\n		}\r\n	}\r\n\r\n#ifdef LOCAL\r\n	cerr.precision(5);\r\n	cerr << \"Time: \" << fixed << (double) clock() / CLOCKS_PER_SEC << endl;\r\n#endif\r\n	return 0;\r\n}', '2017-09-13 02:13:23', '2017-09-13 02:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Abdul Kader Zilani', 'towsif@gmail.com', '$2y$10$5yatxt/QpA07RJJW5q4vEeLbFmV2NMCbHs.PgjAx53ANa.WdT8Ybu', 'PlSjZYkTg4rATx3hpMa0nABQnAM310diS4UdcIkhAPYrvEhoNSCL6Hrnyk48', '2017-07-14 05:52:46', '2017-07-14 05:52:46'),
(2, 'Md. Abdullah Al Maruf', 'abdullahmaruf71@gmail.com', '$2y$10$KPr0z96t87AwBjIFUHgVJ.UJ/W79rWMkkuMJIPvbjFXpXDeks1vF.', '70TGs51apolyD7jGZx5SJmntxyCrqnovXfm3kp586sa8odTWcUHaWQCRw5WY', '2017-09-13 02:26:33', '2017-09-13 02:26:33'),
(3, 'Towsif Zilani', 'zilani@gmail.com', '$2y$10$LNgWP/ie8zub5Y5RU33bDeMpOqrvR10.4s6f3ZhJJBvw9/IbSEP7K', 'th5vv7Ba3CpVTfcXfQ95Abp8VqiGlqha4SeOLY6zyyvxiNpVkZEebHmHKXpy', '2017-09-13 02:27:16', '2017-09-13 02:27:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest_lists`
--
ALTER TABLE `contest_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editorials`
--
ALTER TABLE `editorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges_input_outputs`
--
ALTER TABLE `judges_input_outputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges_solutions`
--
ALTER TABLE `judges_solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `problem_sets`
--
ALTER TABLE `problem_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contest_lists`
--
ALTER TABLE `contest_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `editorials`
--
ALTER TABLE `editorials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `judges_input_outputs`
--
ALTER TABLE `judges_input_outputs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `judges_solutions`
--
ALTER TABLE `judges_solutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `problem_sets`
--
ALTER TABLE `problem_sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
