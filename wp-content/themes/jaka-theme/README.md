# 辰轩机器人官网主题

该主题承载辰轩机器人官网前台页面，内容源集中在 `inc/chenxuan-content.php`，前台页面模板负责还原官网结构与交互。

## 主要能力

- 首页 Banner、产品、解决方案、服务、新闻等展示区。
- 产品中心、解决方案、案例中心、下载中心、新闻、关于、联系等模板。
- 12 种语言切换：中文、繁体中文、英语、English EU、日语、西班牙语、德语、法语、泰语、韩语、意大利语、越南语。
- 案例中心支持行业/应用筛选、案例详情、图片和视频素材展示。
- 联系表单和咨询弹窗通过 AJAX 保存为后台“辰轩留资”，并发送邮件通知。

## 关键文件

- `inc/chenxuan-content.php`：辰轩官网内容、翻译、案例和素材映射。
- `inc/leads.php`：留资入库与邮件通知。
- `inc/auth.php`：登录/注册接口；短信验证码默认关闭。
- `assets/js/main.js`：前台交互、筛选、搜索、表单提交。
- `assets/css/main.css`、`assets/css/pages.css`：全局与页面样式。

## 维护说明

- 前台可见文案应通过 `chenxuan-content.php` 或 `jaka_t()` / `chenxuan_l()` 输出。
- `ChenXuan` 对应中文固定为“辰轩”，不要替换为其他字。
- 内部函数和目录仍可能保留历史 `jaka` 前缀，属于代码标识，不作为前台品牌文案。
- 新增案例素材时，放入 `wp-content/uploads/chenxuan/solution-cases/{slug}/poster.jpg` 和可选 `video.mp4`，并更新 `chenxuan_case_media_map()`。
- 生产上线前必须配置 SMTP，否则留资能入库但邮件可能无法送达。
