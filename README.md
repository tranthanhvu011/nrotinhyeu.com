# NROTINHYEU.COM — Web Portal

> Web portal phục vụ cộng đồng game Ngọc Rồng Online Tình Yêu.  
> Quản lý tài khoản người chơi, nạp thẻ, diễn đàn, sự kiện và tải game.

---

## Mục lục

- [Giới thiệu](#giới-thiệu)
- [Tính năng](#tính-năng)
- [Công nghệ sử dụng](#công-nghệ-sử-dụng)
- [Kiến trúc hệ thống](#kiến-trúc-hệ-thống)
- [Cấu trúc project](#cấu-trúc-project)
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Cài đặt & Khởi chạy](#cài-đặt--khởi-chạy)
- [Cấu hình môi trường](#cấu-hình-môi-trường)
- [Database Schema](#database-schema)
- [Routes & Endpoints](#routes--endpoints)
- [Tích hợp bên thứ 3](#tích-hợp-bên-thứ-3)
- [Build Frontend Assets](#build-frontend-assets)
- [Triển khai Production](#triển-khai-production)
- [Quy ước phát triển](#quy-ước-phát-triển)
- [Xử lý sự cố](#xử-lý-sự-cố)

---

## Giới thiệu

**nrotinhyeu.com** là web portal chính thức của game **Ngọc Rồng Online Tình Yêu** — phiên bản mobile game Dragon Ball RPG. Website đóng vai trò là cổng thông tin trung tâm, cung cấp:

- Đăng ký / đăng nhập tài khoản game
- Nạp thẻ cào để mua Thỏi Vàng (in-game currency)
- Quản lý bảo mật tài khoản (đổi mật khẩu, mật khẩu cấp 2)
- Diễn đàn cộng đồng cho người chơi
- Bảng xếp hạng sức mạnh
- Tải game đa nền tảng (Android / iOS / PC)
- Cập nhật sự kiện, hướng dẫn tân thủ

Website kết nối trực tiếp với **database của game server**, đồng bộ dữ liệu tài khoản và nhân vật realtime.

---

## Tính năng

### 🔐 Hệ thống tài khoản
| Tính năng | Mô tả |
|:---|:---|
| Đăng ký | Tạo tài khoản game + tài khoản web đồng thời |
| Đăng nhập | Xác thực qua database game, tự tạo session Laravel |
| Đổi mật khẩu | Yêu cầu mật khẩu cấp 2 (nếu đã bật) |
| Mật khẩu cấp 2 | Tạo / đổi / xoá (delay 7 ngày để chống hack) |
| Mở thành viên | Kích hoạt tài khoản, trừ 1 VNĐ từ số dư |
| Kích hoạt tài khoản | Admin kích hoạt cho người chơi mới |

### 💰 Nạp thẻ cào
| Tính năng | Mô tả |
|:---|:---|
| Nhà mạng hỗ trợ | VIETTEL, MOBIFONE, VINAPHONE |
| Mệnh giá | 10K → 1,000K VNĐ |
| Xử lý | Gửi API → nhận callback → cộng tiền vào tài khoản game |
| Tích điểm | 1 điểm / 1,000 VNĐ nạp thành công |
| Chống gian lận | Ban tài khoản sau 100 lần nạp sai liên tiếp |
| Lịch sử nạp | Xem toàn bộ lịch sử giao dịch |

### 💬 Diễn đàn
- Đăng bài viết (rich text editor — Summernote)
- Bình luận
- Xoá bài / bình luận
- Phân trang

### 🏆 Bảng xếp hạng
- Top 10 sức mạnh nhân vật
- Tính điểm từ `data_point` + `pet_power` trong database game
- Cache 24h trong session

### 📱 Tải game & Sự kiện
- Download links: Android (APK), iOS, PC
- Trang sự kiện: Noel, Halloween, x2 August, Linh Thú, Quy Đổi Thỏi Vàng
- Hướng dẫn tân thủ + Giftcode
- Điều khoản sử dụng

---

## Công nghệ sử dụng

| Thành phần | Công nghệ | Phiên bản |
|:---|:---|:---|
| **Framework** | Laravel | 7.29 |
| **Ngôn ngữ** | PHP | ≥ 7.2.5 / 8.0 |
| **Database** | MySQL | 5.7+ / 8.0 |
| **Cache / Lock** | Redis | 5+ |
| **Admin UI** | AdminLTE | 3.x |
| **JS Framework** | jQuery | 3.x |
| **CSS Framework** | Bootstrap | 4.x |
| **Rich Text** | Summernote | 0.8.18 |
| **Alert/Confirm** | SweetAlert2 | latest |
| **Particle Effect** | Particles.js | 2.0.0 |
| **Font** | Google Fonts (Roboto) | — |
| **Frontend Build** | Laravel Mix (Webpack) | 5.x |
| **Form Builder** | laravelcollective/html | 6.4 |
| **HTTP Client** | Guzzle | 6.x / 7.x |
| **API nạp thẻ** | doithe1s.vn | v2 |
| **CAPTCHA** | Google reCAPTCHA | v2 |

---

## Kiến trúc hệ thống

```
┌──────────────┐     ┌──────────────────────────────────────────┐
│   Browser    │────▶│  Laravel Application (PHP)               │
│  (Frontend)  │◀────│                                          │
└──────────────┘     │  ┌─────────────┐  ┌──────────────────┐  │
                     │  │  Routes     │──│  Middleware       │  │
                     │  │  (web.php)  │  │  (Auth, CSRF,    │  │
                     │  └──────┬──────┘  │   CheckRole)     │  │
                     │         │         └──────────────────┘  │
                     │  ┌──────▼──────┐                        │
                     │  │ Controllers │                        │
                     │  │ (FE/)       │                        │
                     │  └──────┬──────┘                        │
                     │         │                               │
                     │  ┌──────▼──────┐  ┌──────────────────┐  │
                     │  │   Models    │──│  Blade Views     │  │
                     │  │ (Eloquent)  │  │  (fe/layout/)    │  │
                     │  └──────┬──────┘  └──────────────────┘  │
                     └─────────┼───────────────────────────────┘
                               │
              ┌────────────────┼────────────────┐
              ▼                ▼                ▼
       ┌────────────┐  ┌────────────┐  ┌──────────────┐
       │   MySQL    │  │   Redis    │  │ doithe1s.vn  │
       │ (Game DB)  │  │  (Cache/   │  │  (Card API)  │
       │            │  │   Lock)    │  │              │
       └────────────┘  └────────────┘  └──────────────┘
```

**Lưu ý quan trọng:** Website kết nối trực tiếp vào database của game server. Bảng `account`, `player` là bảng chung — thay đổi ở đây ảnh hưởng trực tiếp tới game.

---

## Cấu trúc project

```
nrotinhyeu.com/
├── app/
│   ├── Classes.php                  # Model lớp học (legacy)
│   ├── Role.php                     # Model phân quyền (RBAC)
│   ├── User.php                     # Model user Laravel (auth bridge)
│   ├── Helpers/
│   │   └── Helpers.php              # Google reCAPTCHA + API nạp thẻ
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── FE/
│   │   │   │   ├── FEAccountController.php   # Auth + quản lý tài khoản
│   │   │   │   ├── FEAddCardController.php   # Nạp thẻ + callback
│   │   │   │   ├── FEForumController.php     # Diễn đàn CRUD
│   │   │   │   └── FEHomeController.php      # Trang chủ + sự kiện
│   │   │   ├── HomeController.php            # Admin dashboard
│   │   │   ├── UserController.php            # Admin CRUD user
│   │   │   └── RoleController.php            # Admin CRUD role
│   │   ├── Middleware/
│   │   │   ├── CheckAccountLogin.php
│   │   │   └── CheckRole.php
│   │   ├── Requests/                # Form Request validation (11 files)
│   │   └── Responses/
│   │       └── APIResponse.php
│   ├── Models/FE/
│   │   ├── Account.php              # Tài khoản game
│   │   ├── Player.php               # Nhân vật game
│   │   ├── TransLog.php             # Log giao dịch nạp thẻ
│   │   ├── ForumPost.php            # Bài viết diễn đàn
│   │   └── ForumComment.php         # Bình luận
│   └── Services/
│       ├── EOD.php                  # Export On Demand (abstract)
│       └── MenuFilter.php          # AdminLTE menu filter
├── config/                          # Cấu hình Laravel
├── database/
│   ├── migrations/                  # Schema migrations
│   ├── factories/
│   └── seeds/
├── public/
│   ├── assets/
│   │   ├── css/style.css            # Custom CSS
│   │   ├── js/                      # APIService.js, Loading.js
│   │   └── images/                  # Avatar, icons, banners
│   └── vendor/                      # AdminLTE, Bootstrap, jQuery, FontAwesome
├── resources/
│   ├── views/fe/
│   │   ├── layout/
│   │   │   ├── master.blade.php     # Master layout (head, body, scripts)
│   │   │   ├── header.blade.php     # Header + navigation + user info
│   │   │   ├── footer.blade.php     # Footer
│   │   │   ├── page.blade.php       # Page wrapper
│   │   │   └── flash-message.blade.php
│   │   ├── home.blade.php           # Trang chủ
│   │   ├── login.blade.php          # Đăng nhập
│   │   ├── register.blade.php       # Đăng ký
│   │   ├── add-card.blade.php       # Form nạp thẻ
│   │   ├── forum.blade.php          # Danh sách bài viết
│   │   ├── show-post.blade.php      # Chi tiết bài viết + bình luận
│   │   ├── top-power.blade.php      # Bảng xếp hạng
│   │   └── ...                      # Sự kiện, hướng dẫn, download
│   ├── js/
│   ├── sass/
│   └── lang/
├── routes/
│   └── web.php                      # Tất cả routes (Vietnamese URL slugs)
├── .env.example
├── composer.json
├── package.json
└── webpack.mix.js
```

---

## Yêu cầu hệ thống

| Yêu cầu | Phiên bản tối thiểu |
|:---|:---|
| PHP | 7.2.5 (khuyến nghị 8.0+) |
| Composer | 2.x |
| MySQL | 5.7+ |
| Redis | 5+ |
| Node.js | 12+ (cho build frontend) |
| npm | 6+ |

**PHP Extensions cần thiết:**
- `pdo_mysql`
- `phpredis` (hoặc `predis`)
- `mbstring`
- `openssl`
- `curl`
- `json`
- `tokenizer`
- `xml`

---

## Cài đặt & Khởi chạy

### 1. Clone repository

```bash
git clone <repo-url> nrotinhyeu.com
cd nrotinhyeu.com
```

### 2. Cài đặt dependencies

```bash
# PHP dependencies
composer install

# Frontend dependencies
npm install
```

### 3. Cấu hình môi trường

```bash
cp .env.example .env
php artisan key:generate
```

Chỉnh sửa file `.env` — xem mục [Cấu hình môi trường](#cấu-hình-môi-trường).

### 4. Database

```bash
# Tạo database MySQL
mysql -u root -p -e "CREATE DATABASE nrotinhyeu CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Chạy migrations
php artisan migrate
```

> **Lưu ý:** Các bảng `account`, `player` là bảng của game server — KHÔNG chạy migration cho chúng. Chỉ đảm bảo `.env` trỏ đúng database.

### 5. Build frontend assets

```bash
# Development
npm run dev

# Watch mode (auto-rebuild khi thay đổi)
npm run watch
```

### 6. Khởi chạy

```bash
php artisan serve
```

Truy cập: `http://localhost:8000`

---

## Cấu hình môi trường

File `.env` cần cấu hình các biến sau:

```env
# ========== Application ==========
APP_NAME="NRO Tinh Yeu"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# ========== Database (Game Server) ==========
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nrotinhyeu
DB_USERNAME=root
DB_PASSWORD=

# ========== Redis ==========
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# ========== Session ==========
SESSION_DRIVER=file
SESSION_LIFETIME=120

# ========== API Nạp thẻ (doithe1s.vn) ==========
# Cấu hình trong config/constants.php
# PARTNER_ID=...
# PARTNER_KEY=...

# ========== Google reCAPTCHA ==========
# Cấu hình trong config/constants.php
# GOOGLE_URL_CAPTCHA=https://www.google.com/recaptcha/api/siteverify
# GOOGLE_SECRET_CAPTCHA=...
```

---

## Database Schema

### Bảng do Laravel quản lý

| Bảng | Mô tả |
|:---|:---|
| `users` | Tài khoản web Laravel (auth session) |
| `roles` | Phân quyền: SuperAdmin (1), Teacher (2), Student (3) |
| `forum_posts` | Bài viết diễn đàn |
| `forum_comments` | Bình luận diễn đàn |
| `trans_log` | Log giao dịch nạp thẻ |
| `failed_jobs` | Laravel failed queue jobs |
| `migrations` | Tracking migrations |

### Bảng của Game Server (KHÔNG SỬA CẤU TRÚC)

| Bảng | Key Fields | Mô tả |
|:---|:---|:---|
| `account` | username, password, ban, active, vnd, tongnap, mkc2, del_pass2, tichdiemweb | Tài khoản game chính |
| `player` | account_id, name, gender, data_point (JSON), skills, pet, pet_power, items_* | Dữ liệu nhân vật game |

### Quan hệ giữa các bảng

```
users ──────── roles          (belongsTo: user.role_id → roles.id)
users ──────── account        (belongsTo: user.username → account.username)
account ────── player         (hasOne: account.id → player.account_id)
users ──────── forum_posts    (hasMany)
users ──────── forum_comments (hasMany)
forum_posts ── forum_comments (hasMany)
account ────── trans_log      (hasMany via username)
```

---

## Routes & Endpoints

### Routes công khai (không cần đăng nhập)

| Method | URI | Controller | Mô tả |
|:---|:---|:---|:---|
| GET | `/` | FEHomeController@index | Trang chủ |
| GET | `/dang-nhap` | FEAccountController@getLogin | Form đăng nhập |
| POST | `/dang-nhap` | FEAccountController@postLogin | Xử lý đăng nhập |
| GET | `/dang-ky` | FEAccountController@getRegister | Form đăng ký |
| POST | `/dang-ky` | FEAccountController@postRegister | Xử lý đăng ký |
| GET | `/bang-xep-hang` | FEAccountController@topPower | Bảng xếp hạng |
| GET | `/card-callback` | FEAddCardController@cardCallback | Callback nạp thẻ |
| GET | `/dien-dan` | FEForumController@index | Danh sách diễn đàn |
| GET | `/dien-dan/{id}` | FEForumController@show | Chi tiết bài viết |
| GET | `/Huong-Dan-Tan-Thu` | FEHomeController@huongDanTanThu | Hướng dẫn tân thủ |
| GET | `/dieu-khoang` | FEHomeController@dieuKhoang | Điều khoản |
| GET | `/su-kien-moi` | FEHomeController@suKienMoi | Sự kiện |
| GET | `/tai-game-android` | FEHomeController@downloadGameAndroid | Tải game Android |
| GET | `/tai-game-pc` | FEHomeController@downloadGamePC | Tải game PC |
| GET | `/tai-game-ios` | FEHomeController@downloadGameIOS | Tải game iOS |

### Routes yêu cầu đăng nhập (middleware: `auth`)

| Method | URI | Controller | Mô tả |
|:---|:---|:---|:---|
| GET | `/dang-xuat` | FEAccountController@logout | Đăng xuất |
| GET | `/thong-tin-nhan-vat` | FEAccountController@profile | Thông tin nhân vật |
| GET | `/doi-mat-khau` | FEAccountController@getChangePassword | Form đổi mật khẩu |
| POST | `/doi-mat-khau` | FEAccountController@postChangePassword | Xử lý đổi mật khẩu |
| GET | `/mo-thanh-vien` | FEAccountController@getActiveMember | Mở thành viên |
| POST | `/mo-thanh-vien` | FEAccountController@postActiveMember | Xử lý mở thành viên |
| GET | `/mat-khau-cap-2` | FEAccountController@getPassword2 | Quản lý MKC2 |
| POST | `/mat-khau-cap-2` | FEAccountController@postPassword2 | Tạo MKC2 |
| POST | `/doi-mat-khau-cap-2` | FEAccountController@postChangePassword2 | Đổi MKC2 |
| GET | `/xoa-mat-khau-cap-2` | FEAccountController@getDeletePassword2 | Form xoá MKC2 |
| POST | `/xoa-mat-khau-cap-2` | FEAccountController@postDeletePassword2 | Gửi yêu cầu xoá MKC2 |
| GET | `/nap-so-du` | FEAddCardController@getAddCard | Form nạp thẻ |
| POST | `/nap-so-du` | FEAddCardController@postAddCard | Xử lý nạp thẻ |
| GET | `/lich-su-nap-the` | FEAddCardController@addCardHistory | Lịch sử nạp |
| POST | `/dien-dan` | FEForumController@store | Đăng bài viết |
| POST | `/tao-binh-luan/{id}` | FEForumController@createComment | Gửi bình luận |

---

## Tích hợp bên thứ 3

### 1. doithe1s.vn — API Nạp thẻ cào

- **Endpoint:** `https://doithe1s.vn/chargingws/v2`
- **Method:** GET (query string)
- **Params:** `sign`, `telco`, `code`, `serial`, `amount`, `request_id`, `partner_id`, `command=charging`
- **Signature:** `md5(partner_key + pin + serial)`
- **Callback:** Server doithe1s.vn gọi `GET /card-callback` khi xử lý xong
- **Callback verify:** So sánh `md5(partner_key + code + serial)` với `callback_sign`

**Luồng xử lý:**
1. User nhập thông tin thẻ → gửi API doithe1s.vn
2. API trả response tức thì (thành công / chờ xử lý / lỗi)
3. Nếu chờ xử lý → doithe1s.vn callback lại sau
4. Callback thành công → cộng VNĐ + tổng nạp + tích điểm vào tài khoản game

### 2. Google reCAPTCHA

- Dùng cho form đăng ký tài khoản
- Cấu hình `google_url_captcha` và `google_secret_captcha` trong `config/constants.php`

---

## Build Frontend Assets

```bash
# Development build (chưa minify)
npm run dev

# Watch mode — tự rebuild khi thay đổi file
npm run watch

# Production build (minify + optimize)
npm run prod
```

**File cấu hình:** `webpack.mix.js`

```js
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
```

**Lưu ý:** Phần lớn CSS/JS frontend nằm trực tiếp trong `public/assets/` và `public/vendor/` (không qua build pipeline). Chỉ `app.js` và `app.scss` đi qua Laravel Mix.

---

## Triển khai Production

### Checklist trước deploy

- [ ] Đặt `APP_ENV=production` và `APP_DEBUG=false`
- [ ] Chạy `composer install --optimize-autoloader --no-dev`
- [ ] Chạy `npm run prod`
- [ ] Chạy `php artisan config:cache`
- [ ] Chạy `php artisan route:cache`
- [ ] Chạy `php artisan view:cache`
- [ ] Đảm bảo Redis đang chạy
- [ ] Đảm bảo MySQL đang chạy và accessible
- [ ] Kiểm tra quyền ghi thư mục `storage/` và `bootstrap/cache/`
- [ ] Cấu hình `APP_URL` đúng domain production

### Cấu hình web server

**Apache (`.htaccess` đã có sẵn trong `public/`):**
- DocumentRoot trỏ vào `/public`

**Nginx:**

```nginx
server {
    listen 80;
    server_name nrotinhyeu.com;
    root /var/www/nrotinhyeu.com/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## Quy ước phát triển

### Cấu trúc Controllers
- Controllers frontend đặt trong `app/Http/Controllers/FE/`
- Prefix tên: `FE` + tên module, ví dụ: `FEAccountController`
- Admin controllers đặt trực tiếp trong `Controllers/`

### Validation
- Sử dụng **Form Request** cho mọi form POST
- Đặt trong `app/Http/Requests/`
- Tên: `{Action}{Model}Request.php`, ví dụ: `LoginRequest.php`

### Models
- Models game đặt trong `app/Models/FE/`
- Models hệ thống (User, Role, Classes) đặt trong `app/`

### Views
- Layout: `resources/views/fe/layout/`
- Pages: `resources/views/fe/`
- Extends từ `fe.layout.page` → `fe.layout.master`

### Routes
- URL sử dụng tiếng Việt không dấu: `/dang-nhap`, `/nap-so-du`, `/doi-mat-khau`
- Named routes cho mọi endpoint

### Git

```bash
# Commit message format
feat: thêm tính năng nạp thẻ qua Momo
fix: sửa lỗi đăng nhập khi chưa tạo nhân vật
refactor: tách logic nạp thẻ ra service
docs: cập nhật hướng dẫn cài đặt
```

---

## Xử lý sự cố

### Lỗi thường gặp

| Lỗi | Nguyên nhân | Cách xử lý |
|:---|:---|:---|
| `SQLSTATE[HY000] Connection refused` | MySQL chưa chạy hoặc sai thông tin kết nối | Kiểm tra `.env` DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD |
| `Connection refused` (Redis) | Redis chưa chạy | `redis-server` hoặc `sudo service redis start` |
| Trang trắng, không có lỗi | `APP_DEBUG=false` mà có lỗi PHP | Đặt `APP_DEBUG=true`, kiểm tra `storage/logs/laravel.log` |
| Nạp thẻ luôn báo lỗi | Sai `partner_key` hoặc `partner_id` | Kiểm tra `config/constants.php` |
| Đăng nhập thành công nhưng redirect loop | Session driver lỗi | Kiểm tra quyền ghi `storage/framework/sessions/` |
| `Class 'Redis' not found` | Thiếu PHP extension phpredis | `pecl install redis` hoặc cài `predis/predis` |

### Log files

```bash
# Application log
tail -f storage/logs/laravel.log

# Xoá cache khi cần
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

---

## License

Private — Bản quyền thuộc về đội ngũ phát triển NROTINHYEU.
