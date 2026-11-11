<?php
/**
 * Prenatal - Class Registration & Schedule Info Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
$image     = $theme_uri . '/assets/images/lop-hoc-tien-san/';
$map_url   = 'https://www.google.com/maps/place/V%E1%BA%A1n+Ph%C3%BAc+Care/@21.0741276,105.8221623,1041m/data=!3m2!1e3!4b1!4m6!3m5!1s0x3135ab83e4098b37:0xb1b8897775e1ce60!8m2!3d21.0741276!4d105.8221623!16s%2Fg%2F11q2y0_pyw?entry=ttu&g_ep=EgoyMDI2MTAyMC4wIKXMDSoASAFQAw%3D%3D';
?>
<section id="prenatal-registration" class="vpc-section prenatal-registration" aria-labelledby="prenatal-registration-title">
	<div class="prenatal-container prenatal-registration__layout">
		<div class="prenatal-registration__intro">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>HẸN GẶP BỐ MẸ TẠI LỚP</span>
			</div>
			<div class="prenatal-registration__copy">
				<h2 class="prenatal-registration__title">Cùng chuẩn bị cho<br>ngày con chào đời</h2>
				<p>Một buổi học dành riêng cho bố mẹ, với không gian gần gũi và sự đồng hành tận tâm từ đội ngũ điều dưỡng.</p>
			</div>
			<div class="prenatal-registration__info">
				<div class="prenatal-info-card">
					<div class="prenatal-info-card__icon">
						<div class="prenatal-info-card__icon-frame">
							<img src="<?php echo esc_url( $image . 'icons/duration.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
						</div>
					</div>
					<div class="prenatal-info-card__text">
						<b>Sáng cuối tuần · 09:00 – 12:00</b>
						<small>Liên hệ để xác nhận lịch học gần nhất</small>
					</div>
				</div>
				<div class="prenatal-info-card">
					<div class="prenatal-info-card__icon">
						<div class="prenatal-info-card__icon-frame">
							<img src="<?php echo esc_url( $image . 'icons/participants.svg' ); ?>" alt="" aria-hidden="true" width="22" height="16.5" />
						</div>
					</div>
					<div class="prenatal-info-card__text">
						<b>Tối đa 05 cặp cha mẹ/ buổi</b>
						<small>Bố tham gia cùng mẹ không phát sinh phụ phí</small>
					</div>
				</div>
				<div class="prenatal-info-card">
					<div class="prenatal-info-card__icon">
						<div class="prenatal-info-card__icon-frame">
							<img src="<?php echo esc_url( $image . 'icons/map.svg' ); ?>" alt="" aria-hidden="true" width="22" height="30.4051" />
						</div>
					</div>
					<div class="prenatal-info-card__text">
						<b>Tầng 1 - Trung tâm ở cữ Vạn Phúc Care</b>
						<small>
							<span>35B ngõ 399 Âu Cơ, Tây Hồ, Hà Nội</span><br aria-hidden="true" />
							<a href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer" class="prenatal-info-card__map-link">Xem đường đi</a>
						</small>
					</div>
				</div>
			</div>
		</div>
		<div class="prenatal-form-wrap">
			<h2 id="prenatal-registration-title">Đăng Ký Tham Gia <span class="whitespace-nowrap">Lớp&nbsp;Học</span></h2>
			<form id="vpc-prenatal-form" class="prenatal-form" action="#" method="post">
				<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden" />
				<input type="hidden" name="service" value="lop-hoc-tien-san" />
				<div class="prenatal-form__row">
					<div class="prenatal-form__field">
						<label for="prenatal-name"><em>*</em> Họ và tên</label>
						<input id="prenatal-name" name="full_name" required placeholder="Nguyễn Như Linh" />
					</div>
					<div class="prenatal-form__field">
						<label for="prenatal-phone"><em>*</em> Số điện thoại</label>
						<input id="prenatal-phone" name="phone" required type="tel" placeholder="0345678***" />
					</div>
				</div>
				<div class="prenatal-form__field">
					<fieldset>
						<legend><em>*</em> Giai đoạn thai kỳ</legend>
						<div class="prenatal-chips">
							<label class="prenatal-chip is-active">
								<input type="radio" name="pregnancy_stage" value="dang-mang-thai" checked class="sr-only" />
								<span>Đang mang thai</span>
							</label>
							<label class="prenatal-chip">
								<input type="radio" name="pregnancy_stage" value="chuan-bi-mang-thai" class="sr-only" />
								<span>Chuẩn bị mang thai</span>
							</label>
						</div>
					</fieldset>
				</div>
				<div class="prenatal-form__field">
					<?php
					get_template_part( 'template-parts/components/custom-select', null, array(
						'id'          => 'prenatal-stage-select',
						'name'        => 'stage_choice',
						'label'       => 'Tuần thai',
						'placeholder' => 'Chọn giai đoạn',
						'required'    => true,
						'options'     => array(
							'1-12-tuan'  => 'Dưới 12 tuần',
							'13-27-tuan' => '13 - 27 tuần',
							'28-40-tuan' => 'Từ 28 tuần trở lên',
						),
						'class'       => 'prenatal-shared-select',
					) );
					?>
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-note">Ghi chú</label>
					<textarea id="prenatal-note" name="question" rows="2" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!"></textarea>
				</div>
				<button class="prenatal-button prenatal-button--primary" type="submit">Gửi yêu cầu tư vấn</button>
			</form>
		</div>
	</div>
</section>

