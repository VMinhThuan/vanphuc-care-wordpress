# VanPhucCare image mapping audit

Ngày audit: 2026-11-04

## Kết luận kỹ thuật

Các ảnh UI trước đây được render trực tiếp từ `get_template_directory_uri()` và `assets/images/`; chỉ ảnh bài viết dùng Featured Image native. Theme hiện dùng `vpc_image_url()` cho ảnh nội dung.

Resolver này:

1. dùng Attachment ID trong theme mod `vpc_image_<slug>_id` nếu được cấu hình;
2. nếu chưa có ID, tìm `_wp_attached_file` theo basename chính xác và chỉ dùng khi có đúng một attachment image;
3. nếu không tìm thấy hoặc có basename trùng, giữ asset đã kiểm tra trong theme, không chọn ảnh gần giống.

Khi Attachment ID được resolve trên WordPress, URL được tạo bằng `wp_get_attachment_image_url()`; không có URL domain/uploads hard-code trong những vị trí đã chuyển đổi.

## Bảng mapping

| Trang / Section | File hiện tại | Media URL đúng | Attachment ID | Nguyên nhân lỗi | Trạng thái |
| --- | --- | --- | --- | --- | --- |
| Trang chủ / Hero slide 1 | `front-page.php:42` | Runtime: `wp_get_attachment_image_url(ID, 'full')`, basename `Trang chủ/hero-banner.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset, không qua Media Library | Đã sửa resolver; cần xác nhận staging |
| Trang chủ / Hero slide 2 | `front-page.php:63` | Runtime, basename `Trang chủ/hero-banner-2.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver; cần xác nhận staging |
| Trang chủ / Hero slide 3 | `front-page.php:77` | Runtime, basename `Trang chủ/hero-banner-3.JPG` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset / khác hoa-thường extension | Đã sửa resolver; cần xác nhận staging |
| Trang chủ / Giới thiệu | `front-page.php:118` | Runtime, basename `Trang chủ/hero-section-image.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Trung tâm ở cữ | `front-page.php:252` | Runtime, basename `Trang chủ/trung-tam-o-cu.JPG` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Bảo mẫu | `front-page.php:353,362` | Runtime, basenames `ba-mau-tai-nha-2.jpg`, `bao-mau-tai-nha-1.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Lớp học tiền sản | `front-page.php:444,453` | Runtime, basenames `lop-hoc-tien-san-1.jpg`, `lop-hoc-tien-san-2.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Vì sao chọn VPC | `front-page.php:736,737` | Runtime, basenames `vi-sao-chon-VPC.webp/.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `source/src` | Đã sửa resolver |
| Trang chủ / Báo chí | `front-page.php:1425,1452,1478` | Runtime, basenames `Bai-bao-noi-bat.jpg`, `press_event_2.jpg`, `press_event_3.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Feedback avatars | `front-page.php:912-1370` | Runtime, basenames `avatars/customer_1.png` đến `customer_5.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset lặp lại | Đã sửa resolver |
| Trang chủ / Kiến thức | `front-page.php:1646` | Featured Image native: `the_post_thumbnail('medium_large')` | WordPress post thumbnail ID | Fallback cũ là theme asset nếu post thiếu featured image | Đã giữ native; fallback dùng resolver |
| Bài viết / Archive / Single | `template-parts/content/content.php:27-30` | Featured Image native: `the_post_thumbnail('large'/'medium_large')` | WordPress post thumbnail ID | Không có hard-code URL trong content template | Đã xác minh native |
| Header / Logo + favicon | `header.php:23-38,85` | Runtime, basenames `logo.svg`, `Logo-van-phuc-care-300x300.png`, `Logo-van-phuc-care-180x180.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Footer / watermark + logo | `footer.php:30,47` | Runtime, basenames `footer-watermark.svg`, `logo.svg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang Liên hệ / ảnh trung tâm | `page-lien-he.php:206` | Runtime, basename `contact-center-figma.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang Lớp học tiền sản / hero | `page-lop-hoc-tien-san.php:45-46` | Runtime, basenames `hero-class-actual.png`, `hero-mother-baby.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image` | Đã sửa resolver, giữ mobile `<picture>` |
| Trang Lớp học tiền sản / intro | `page-lop-hoc-tien-san.php:87-88` | Runtime, basenames `intro-class-actual.png`, `intro-family.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image` | Đã sửa resolver, giữ mobile `<picture>` |
| Trang Lớp học tiền sản / video + giảng viên | `page-lop-hoc-tien-san.php:147,312` | Runtime, basenames `class-video.png`, `teacher-thanh-thuy-card.png`, `teacher-thanh-thuy-card@2x.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image`, srcset 2x cũ | Đã sửa resolver |
| Trang Lớp học tiền sản / dịch vụ | `page-lop-hoc-tien-san.php:486-498` | Runtime, basenames `service-homecare.png`, `service-newborn.png`, `service-massage.png`, `service-online-course.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image` | Đã sửa resolver |
| Policy pages / banner | `page-*.php` policy templates | Runtime, basename `hero_bg.jpg` | Resolve khi chạy staging; chưa thể đọc API | Inline background URL từ theme | Đã sửa resolver |

## Danh sách cần đối chiếu thủ công khi staging/API hoạt động

Source audit hiện có **49 call sites**: 48 references có filename cố định và 1 resolver động cho prefix `lop-hoc-tien-san/`. Các dòng dưới đây là danh sách filename/path cần tìm trong Media Library; không coi asset fallback local là bằng chứng mapping thành công.

| Filename/path đang tìm | Số lần gọi | Vị trí sử dụng |
| --- | ---: | --- |
| `Trang chủ/hero-banner.png` | 1 | `front-page.php:42` — Hero 1 |
| `Trang chủ/hero-banner-2.jpg` | 1 | `front-page.php:63` — Hero 2 |
| `Trang chủ/hero-banner-3.JPG` | 1 | `front-page.php:77` — Hero 3; kiểm tra `.JPG`/`.jpg` |
| `Trang chủ/hero-section-image.jpg` | 1 | `front-page.php:118` |
| `Trang chủ/trung-tam-o-cu.JPG` | 1 | `front-page.php:252` |
| `Trang chủ/ba-mau-tai-nha-2.jpg` | 1 | `front-page.php:353` |
| `Trang chủ/bao-mau-tai-nha-1.jpg` | 1 | `front-page.php:362` |
| `Trang chủ/lop-hoc-tien-san-1.jpg` | 1 | `front-page.php:444` |
| `Trang chủ/lop-hoc-tien-san-2.jpg` | 1 | `front-page.php:453` |
| `Trang chủ/vi-sao-chon-VPC.webp` | 1 | `front-page.php:736` — `<source>` |
| `Trang chủ/vi-sao-chon-VPC.jpg` | 1 | `front-page.php:737` — `<img>` |
| `Trang chủ/Bai-bao-noi-bat.jpg` | 1 | `front-page.php:1425` |
| `press_event_2.jpg` | 1 | `front-page.php:1452` |
| `press_event_3.jpg` | 1 | `front-page.php:1478` |
| `blog_post_ultrasound.jpg` | 1 | `front-page.php:1649` — fallback khi post thiếu Featured Image |
| `avatars/customer_1.png` | 3 | `front-page.php:912,1038,1269` |
| `avatars/customer_2.png` | 4 | `front-page.php:937,1063,1169,1295` |
| `avatars/customer_3.png` | 4 | `front-page.php:962,1088,1194,1320` |
| `avatars/customer_4.png` | 4 | `front-page.php:987,1113,1219,1345` |
| `avatars/customer_5.png` | 4 | `front-page.php:1012,1138,1244,1370` |
| `logo.svg` | 3 | `header.php:38,85`; `footer.php:47` |
| `Logo-van-phuc-care-300x300.png` | 1 | `header.php:23` |
| `Logo-van-phuc-care-180x180.png` | 2 | `header.php:24,25` |
| `footer-watermark.svg` | 1 | `footer.php:30` |
| `contact-center-figma.jpg` | 1 | `page-lien-he.php:206` |
| `hero_bg.jpg` | 4 | Policy templates: `page-chinh-sach-bao-mat.php:25`, `page-chinh-sach-bien-tap.php:25`, `page-dieu-khoan-su-dung.php:21`, `page-quy-trinh-khieu-nai.php:25` |
| `Trang chủ/success-consultation-modal.svg` | 1 | `template-parts/components/success-modal.php:24` |
| `icons/newborn-care.svg` | 1 | `front-page.php:398` |
| `lop-hoc-tien-san/*` | dynamic | `page-lop-hoc-tien-san.php:18`; includes hero, intro, video, teacher and 4 service photos; inspect each basename in source lines 45-498 |

## Chưa thể xác minh từ môi trường hiện tại

- `https://staging.vanphuccare.vn/` không phân giải DNS trong môi trường audit; vì vậy chưa đọc được frontend, Console/Network hoặc `/wp-json/wp/v2/media`.
- Do không có quyền API/WP-CLI staging trong workspace, Attachment ID và Media URL tuyệt đối chưa được điền giả. Cần chạy lại audit khi staging accessible.
- Các SVG/icon trang trí còn là theme-owned assets; không tự map sang Media Library vì chưa có bằng chứng Attachment ID tương ứng.
- Không có thao tác database, plugin, upload/xóa media hoặc production nào được thực hiện.

## Kiểm tra đã chạy

- `npm run build`: pass.
- `npm run test:static-qa`: pass; đã audit 8 viewport, 11 section, hero slider, modal/AJAX, floating contact và footer.
- PHP lint/integration chưa chạy được vì máy audit không có PHP CLI.
