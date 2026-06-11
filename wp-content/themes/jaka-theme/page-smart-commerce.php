<?php
/**
 * Template Name: 智慧商业
 */
get_header();
?>

<div class="jp-page">
    <section class="jp-banner">
        <div class="jp-banner-bg" style="background:linear-gradient(135deg,#10233f,#0f766e,#2563eb);">
            <div class="jp-banner-cover"></div>
        </div>
        <div class="jp-banner-txt">
            <h1><?php echo esc_html(chenxuan_l('智慧商业场景')); ?></h1>
            <p><?php echo esc_html(chenxuan_l('机器人咖啡工作站 · 智能饮品吧台 · 无人零售终端 · 智慧餐厅')); ?></p>
        </div>
    </section>

    <section class="jp-part1">
        <div class="jp-part1-desc">
            <p><?php echo esc_html(chenxuan_l('辰轩将机器人技术与商业服务场景结合，面向机器人咖啡工作站、智能饮品吧台、无人零售终端、智慧餐厅、智能厨房和酒店服务，提供可落地的自动化集成方案。')); ?></p>
        </div>
        <div class="jp-categories">
            <?php
            $categories = [
                ['机器人咖啡工作站', '从点单、制作到出品的自动化饮品服务单元'],
                ['智能饮品吧台', '适配多品类饮品制作与标准化出杯流程'],
                ['无人零售终端', '结合自动化取放、补货与交互体验'],
                ['智慧餐厅与厨房', '面向后厨、出餐和服务流程的机器人应用'],
                ['酒店服务场景', '围绕配送、接待和服务体验进行智能升级'],
            ];
            foreach ($categories as $cat) : ?>
            <div class="jp-cat-item" style="background:linear-gradient(135deg,rgba(16,35,63,0.92),rgba(15,118,110,0.78));">
                <span class="jp-cat-name"><?php echo esc_html(chenxuan_l($cat[0])); ?></span>
                <span class="jp-cat-more"><?php echo esc_html(chenxuan_l($cat[1])); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="jp-part2">
        <h2 class="jp-part2-title"><?php echo esc_html(chenxuan_l('从商业体验到稳定运营')); ?></h2>
        <div class="jp-partner-grid">
            <?php
            $values = ['场景设计', '机器人集成', '工艺开发', '控制系统', '现场交付', '远程运维', '操作培训', '持续优化'];
            foreach ($values as $value) : ?>
            <div class="jp-partner-cell" style="display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--color-text-dark);">
                <?php echo esc_html(chenxuan_l($value)); ?>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="jp-part3">
        <div class="jp-part3-left">
            <h2><?php echo esc_html(chenxuan_l('咨询智慧商业自动化方案')); ?></h2>
            <div class="jp-contact-info">
                <div class="jp-contact-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                    <div>
                        <span class="jp-contact-label"><?php echo esc_html(chenxuan_l('沟通内容')); ?></span>
                        <strong><?php echo esc_html(chenxuan_l('场景、流程、设备、空间与运营目标')); ?></strong>
                    </div>
                </div>
                <div class="jp-contact-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <div>
                        <span class="jp-contact-label"><?php echo esc_html(chenxuan_l('提交方式')); ?></span>
                        <strong><?php echo esc_html(chenxuan_l('填写右侧需求表单')); ?></strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="jp-part3-right">
            <form class="jp-apply-form" method="post">
                <input type="hidden" name="source" value="smart-commerce">
                <input type="text" name="website" class="lead-hp" tabindex="-1" autocomplete="off">
                <div class="jp-form-row">
                    <div class="jp-form-group jp-form-half">
                        <label><span>*</span> <?php echo esc_html(jaka_t('ct_name')); ?></label>
                        <input type="text" name="name" required placeholder="<?php echo esc_attr(jaka_t('ct_name_ph')); ?>">
                    </div>
                    <div class="jp-form-group jp-form-half">
                        <label><span>*</span> <?php echo esc_html(jaka_t('ct_company')); ?></label>
                        <input type="text" name="company" required placeholder="<?php echo esc_attr(jaka_t('ct_company_ph')); ?>">
                    </div>
                </div>
                <div class="jp-form-row">
                    <div class="jp-form-group jp-form-half">
                        <label><span>*</span> <?php echo esc_html(jaka_t('ct_phone_label')); ?></label>
                        <input type="text" name="phone" required placeholder="<?php echo esc_attr(jaka_t('ct_phone_ph')); ?>">
                    </div>
                    <div class="jp-form-group jp-form-half">
                        <label><?php echo esc_html(jaka_t('ct_email_label')); ?></label>
                        <input type="email" name="email" placeholder="<?php echo esc_attr(jaka_t('ct_email_ph')); ?>">
                    </div>
                </div>
                <div class="jp-form-row">
                    <div class="jp-form-group jp-form-third">
                        <label><?php echo esc_html(chenxuan_l('场景类型')); ?></label>
                        <select name="type">
                            <option value=""><?php echo esc_html(jaka_t('ct_select')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('机器人咖啡工作站')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('智能饮品吧台')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('无人零售终端')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('智慧餐厅')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('智能厨房')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('酒店服务')); ?></option>
                        </select>
                    </div>
                    <div class="jp-form-group jp-form-third">
                        <label><?php echo esc_html(chenxuan_l('项目阶段')); ?></label>
                        <input type="text" name="stage" placeholder="<?php echo esc_attr(chenxuan_l('规划中/改造中/待落地')); ?>">
                    </div>
                    <div class="jp-form-group jp-form-third">
                        <label><?php echo esc_html(chenxuan_l('咨询目的')); ?></label>
                        <select name="purpose">
                            <option value=""><?php echo esc_html(jaka_t('ct_select')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('了解方案')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('项目评估')); ?></option>
                            <option><?php echo esc_html(chenxuan_l('合作沟通')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="jp-form-group">
                    <label><?php echo esc_html(jaka_t('ct_message')); ?></label>
                    <textarea name="remark" rows="4" required placeholder="<?php echo esc_attr(chenxuan_l('请描述业务场景、设备流程、空间限制或运营目标')); ?>"></textarea>
                </div>
                <div class="jp-form-agree">
                    <input type="checkbox" id="jp-agree" name="agree" required>
                    <label for="jp-agree"><?php echo esc_html(jaka_t('ct_agree')); ?><a href="<?php echo esc_url(chenxuan_legal_url('privacy-policy')); ?>"><?php echo esc_html(jaka_t('privacy_policy')); ?></a></label>
                </div>
                <button type="submit" class="jp-submit-btn"><?php echo esc_html(jaka_t('ct_submit')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></button>
            </form>
        </div>
    </section>
</div>

<?php get_footer(); ?>
