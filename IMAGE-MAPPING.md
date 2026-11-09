# VanPhucCare image mapping audit

Ngày audit: 2026-11-04

## Kết luận kỹ thuật

Các ảnh UI trước đây được render trực tiếp từ `get_template_directory_uri()` và `assets/images/`; chỉ ảnh bài viết dùng Featured Image native. Theme hiện dùng `vpc_image_url()` cho ảnh nội dung.

Resolver này:

1. dùng Attachment ID trong theme mod `vpc_image_<slug>_id` nếu được cấu hình;
2. nếu chưa có ID, tìm `_wp_attached_file` theo basename chính xác và chỉ dùng khi có đúng một attachment image;
3. nếu không tìm thấy hoặc có basename trùng, trả về chuỗi rỗng; không dùng asset theme, placeholder hoặc ảnh gần giống.

Khi Attachment ID được resolve trên WordPress, URL được tạo bằng `wp_get_attachment_image_url()`; không có URL domain/uploads hard-code trong những vị trí đã chuyển đổi.

## Bảng mapping

| Trang / Section | File hiện tại | Media URL đúng | Attachment ID | Nguyên nhân lỗi | Trạng thái |
| --- | --- | --- | --- | --- | --- |
| Trang chủ / Hero slide 1-3 | `front-page.php:29-60` | Runtime: `wp_get_attachment_image_url(ID, 'full')`, basenames `hero-banner.png`, `hero-banner-2.jpg`, `hero-banner-3.JPG` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset, không qua Media Library | Đã sửa resolver; cần xác nhận staging |
| Trang chủ / Giới thiệu | `front-page.php:131` | Runtime, basename `Trang chủ/hero-section-image.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Trung tâm ở cữ | `front-page.php:268` | Runtime, basename `Trang chủ/trung-tam-o-cu.JPG` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Bảo mẫu | `front-page.php:371,383` | Runtime, basenames `ba-mau-tai-nha-2.jpg`, `bao-mau-tai-nha-1.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Lớp học tiền sản | `front-page.php:471,483` | Runtime, basenames `lop-hoc-tien-san-1.jpg`, `lop-hoc-tien-san-2.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Vì sao chọn VPC | `front-page.php:770-778` | Runtime, basenames `vi-sao-chon-VPC.webp/.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `source/src` | Đã sửa resolver |
| Trang chủ / Báo chí | `front-page.php:1466,1497,1526` | Runtime, basenames `Bai-bao-noi-bat.jpg`, `press_event_2.jpg`, `press_event_3.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang chủ / Feedback avatars | `front-page.php:954-1412` | Runtime, basenames `avatars/customer_1.png` đến `customer_5.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset lặp lại | Đã sửa resolver |
| Trang chủ / Kiến thức | `front-page.php:1697-1703` | Featured Image native: `the_post_thumbnail('medium_large')` | WordPress post thumbnail ID | Post thiếu Featured Image thì resolver Media Library có thể trả rỗng | Đã giữ native; không dùng theme fallback |
| Bài viết / Archive / Single | `template-parts/content/content.php:27-30` | Featured Image native: `the_post_thumbnail('large'/'medium_large')` | WordPress post thumbnail ID | Không có hard-code URL trong content template | Đã xác minh native |
| Header / Logo + favicon | `header.php:23-48,92-103` | Runtime, basenames `logo.svg`, `Logo-van-phuc-care-300x300.png`, `Logo-van-phuc-care-180x180.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Footer / watermark + logo | `footer.php:30-58` | Runtime, basenames `footer-watermark.svg`, `logo.svg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang Liên hệ / ảnh trung tâm | `page-lien-he.php:205-214` | Runtime, basename `contact-center-figma.jpg` | Resolve khi chạy staging; chưa thể đọc API | Hard-code theme asset | Đã sửa resolver |
| Trang Lớp học tiền sản / hero | `page-lop-hoc-tien-san.php:44-53` | Runtime, basenames `hero-class-actual.png`, `hero-mother-baby.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image` | Đã sửa resolver, giữ mobile `<picture>` |
| Trang Lớp học tiền sản / intro | `page-lop-hoc-tien-san.php:93-102` | Runtime, basenames `intro-class-actual.png`, `intro-family.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image` | Đã sửa resolver, giữ mobile `<picture>` |
| Trang Lớp học tiền sản / video + giảng viên | `page-lop-hoc-tien-san.php:166,367-369` | Runtime, basenames `class-video.png`, `teacher-thanh-thuy-card.png`, `teacher-thanh-thuy-card@2x.png` | Resolve khi chạy staging; chưa thể đọc API | Hard-code `$image`, srcset 2x cũ | Đã sửa resolver |
| Trang Lớp học tiền sản / dịch vụ | `page-lop-hoc-tien-san.php:507-528` | Runtime, basenames `bao-mau/service-1.jpg` đến `bao-mau/service-6.jpg` | Resolve khi chạy staging; chưa thể đọc API | Dùng chung UI/tài sản section dịch vụ của Bảo mẫu | Đã đồng bộ responsive mobile/desktop |
| Policy pages / banner | `page-*.php` policy templates | Runtime, basename `hero_bg.jpg` | Resolve khi chạy staging; chưa thể đọc API | Inline background URL từ theme | Đã sửa resolver |

## Danh sách cần đối chiếu thủ công khi staging/API hoạt động

Audit ban đầu có **49 call sites logic**: 48 references có filename cố định và 1 resolver động cho prefix `lop-hoc-tien-san/`. Sau khi gom 3 hero slide vào một vòng lặp, source hiện có 46 lời gọi resolver (45 cố định + 1 động), nhưng vẫn giữ đủ 49 mapping logic. Các dòng dưới đây là danh sách filename/path cần tìm trong Media Library; không coi asset fallback local là bằng chứng mapping thành công.

| Filename/path đang tìm | Số lần gọi | Vị trí sử dụng |
| --- | ---: | --- |
| `Trang chủ/hero-banner.png` | 1 | `front-page.php:31` — Hero 1 |
| `Trang chủ/hero-banner-2.jpg` | 1 | `front-page.php:40` — Hero 2 |
| `Trang chủ/hero-banner-3.JPG` | 1 | `front-page.php:46` — Hero 3; kiểm tra `.JPG`/`.jpg` |
| `Trang chủ/hero-section-image.jpg` | 1 | `front-page.php:131` |
| `Trang chủ/trung-tam-o-cu.JPG` | 1 | `front-page.php:268` |
| `Trang chủ/ba-mau-tai-nha-2.jpg` | 1 | `front-page.php:371` |
| `Trang chủ/bao-mau-tai-nha-1.jpg` | 1 | `front-page.php:383` |
| `Trang chủ/lop-hoc-tien-san-1.jpg` | 1 | `front-page.php:471` |
| `Trang chủ/lop-hoc-tien-san-2.jpg` | 1 | `front-page.php:483` |
| `Trang chủ/vi-sao-chon-VPC.webp` | 1 | `front-page.php:770` — `<source>` |
| `Trang chủ/vi-sao-chon-VPC.jpg` | 1 | `front-page.php:771` — `<img>` |
| `Trang chủ/Bai-bao-noi-bat.jpg` | 1 | `front-page.php:1466` |
| `press_event_2.jpg` | 1 | `front-page.php:1497` |
| `press_event_3.jpg` | 1 | `front-page.php:1526` |
| `blog_post_ultrasound.jpg` | 1 | `front-page.php:1700` — Media Library-only image khi post thiếu Featured Image; rỗng thì không render |
| `avatars/customer_1.png` | 3 | `front-page.php:954,1080,1311` |
| `avatars/customer_2.png` | 4 | `front-page.php:979,1105,1211,1337` |
| `avatars/customer_3.png` | 4 | `front-page.php:1004,1130,1236,1362` |
| `avatars/customer_4.png` | 4 | `front-page.php:1029,1155,1261,1387` |
| `avatars/customer_5.png` | 4 | `front-page.php:1054,1180,1286,1412` |
| `logo.svg` | 3 | `header.php:42,92`; `footer.php:50` |
| `Logo-van-phuc-care-300x300.png` | 1 | `header.php:23` |
| `Logo-van-phuc-care-180x180.png` | 2 | `header.php:24,25` |
| `footer-watermark.svg` | 1 | `footer.php:30` |
| `contact-center-figma.jpg` | 1 | `page-lien-he.php:205` |
| `hero_bg.jpg` | 4 | Policy templates: `page-chinh-sach-bao-mat.php:25`, `page-chinh-sach-bien-tap.php:25`, `page-dieu-khoan-su-dung.php:21`, `page-quy-trinh-khieu-nai.php:25` |
| `Trang chủ/success-consultation-modal.svg` | 1 | `template-parts/components/success-modal.php:24` |
| `icons/newborn-care.svg` | 1 | `front-page.php:424` |
| `lop-hoc-tien-san/*` | dynamic | `page-lop-hoc-tien-san.php:18`; includes hero, intro, video, teacher and 4 service photos; inspect each basename in source lines 44-523 |

## Trạng thái xác minh staging

- `https://staging.vanphuccare.vn/` không phân giải DNS trong môi trường audit; vì vậy chưa đọc được frontend, Console/Network hoặc `/wp-json/wp/v2/media`.
- Do không có quyền API/WP-CLI staging trong workspace, Attachment ID và Media URL tuyệt đối chưa được điền giả. Cần chạy lại audit khi staging accessible.
- Resolver hiện không có fallback về theme assets. Khi Attachment ID/filename không hợp lệ, template bỏ qua thẻ ảnh hoặc background URL tương ứng.
- Không có thao tác database, plugin, upload/xóa media hoặc production nào được thực hiện.

## Công cụ export Media Library read-only

Đã tạo:

- `tools/export-media-library.mjs`: chỉ gọi `GET /wp-json/wp/v2/media`, phân trang theo `X-WP-TotalPages`, xuất Attachment ID, filename, source URL, MIME type và metadata.
- `tools/media-mapping.json`: 29 mapping entries theo danh sách trên; `verified_attachment_id` mặc định là `null`.

Chạy trên máy có thể truy cập staging:

```bash
WP_BASE_URL=https://staging.vanphuccare.vn \
WP_USERNAME='staging-user' \
WP_APP_PASSWORD='xxxx xxxx xxxx xxxx' \
node tools/export-media-library.mjs \
  --output /tmp/vanphuccare-media-library.json \
  --mapping tools/media-mapping.json \
  --report /tmp/vanphuccare-media-mapping-report.json
```

Có thể bỏ `WP_USERNAME` và `WP_APP_PASSWORD` nếu REST endpoint public. Script không ghi ngược vào WordPress; chỉ ghi hai file JSON cục bộ. Chỉ cập nhật `verified_attachment_id` sau khi đối chiếu thủ công đúng file trên staging. Các trạng thái `duplicate_filename_requires_manual_id`, `size_variant_only_requires_manual_id` và `unmatched_requires_manual_id` không được tự động mapping.

## Kiểm tra đã chạy

- `npm run build`: pass.
- `npm run test`: alias tới static QA.
- `npm run test:static-qa`: pass; đã audit 8 viewport, 11 section, hero slider, modal/AJAX, floating contact và footer.
- PHP lint/integration chưa chạy được vì máy audit không có PHP CLI.
