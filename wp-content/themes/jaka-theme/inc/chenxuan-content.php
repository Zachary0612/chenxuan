<?php
/**
 * ChenXuan Robotics site content.
 *
 * Visible copy is sourced from the provided "辰轩官网.docx" brief. The restored
 * visual structure remains, while this file owns all ChenXuan-facing content.
 */
if (!defined('ABSPATH')) exit;

function chenxuan_current_lang_code() {
    return function_exists('jaka_current_lang') ? jaka_current_lang() : 'zh';
}

function chenxuan_normalize_brand_copy($text) {
    return str_replace(
        ['辰轩机器人', '晨轩机器人', '辰轩', '晨轩', 'Chenxuan'],
        ['ChenXuan Robot', 'ChenXuan Robot', 'ChenXuan', 'ChenXuan', 'ChenXuan'],
        (string) $text
    );
}

function chenxuan_supported_languages() {
    return [
        ['code' => 'zh', 'label' => '简体中文'],
        ['code' => 'zh_tw', 'label' => '繁体中文'],
        ['code' => 'en', 'label' => 'English Global'],
        ['code' => 'en_eu', 'label' => 'English EU'],
        ['code' => 'ja', 'label' => '日本語'],
        ['code' => 'es', 'label' => 'Español'],
        ['code' => 'de', 'label' => 'Deutsch'],
        ['code' => 'fr', 'label' => 'Français'],
        ['code' => 'th', 'label' => 'ไทย'],
        ['code' => 'ko', 'label' => '한국어'],
        ['code' => 'it', 'label' => 'Italiano'],
        ['code' => 'vi', 'label' => 'Tiếng Việt'],
    ];
}

function chenxuan_to_traditional($text) {
    return strtr($text, [
        '辰轩' => '辰軒', '机器人' => '機器人', '工业' => '工業', '自动化' => '自動化',
        '解决方案' => '解決方案', '产品' => '產品', '系列' => '系列', '协作' => '協作', '系统' => '系統',
        '智能' => '智慧', '制造' => '製造', '服务' => '服務', '支持' => '支援',
        '下载' => '下載', '资料' => '資料', '关于' => '關於', '联系' => '聯絡',
        '应用' => '應用', '行业' => '行業', '案例' => '案例', '中心' => '中心',
        '新闻' => '新聞', '体系' => '體系', '场景' => '場景', '搬运' => '搬運',
        '码垛' => '碼垛', '喷涂' => '噴塗', '打磨' => '打磨', '焊接' => '焊接',
        '装配' => '裝配', '机床' => '機床', '上下料' => '上下料', '远程' => '遠端',
        '运维' => '運維', '提交' => '提交', '需求' => '需求', '登录' => '登入',
        '注册' => '註冊', '隐私' => '隱私', '用户' => '使用者', '协议' => '協議',
        '当前' => '目前', '全部' => '全部', '筛选' => '篩選', '语言' => '語言', '工程' => '工程',
        '机械' => '機械', '汽车' => '汽車', '零部件' => '零組件', '金属' => '金屬',
        '钢结构' => '鋼結構', '船舶' => '船舶', '智慧商业' => '智慧商業',
    ]);
}

function chenxuan_content_en_map() {
    return [
        '辰轩机器人' => 'ChenXuan Robotics',
        '辰轩' => 'ChenXuan',
        '全部' => 'All',
        '典型应用' => 'Typical Applications',
        '行业' => 'Industry',
        '应用' => 'Application',
        '筛选' => 'Filter',
        '语言' => 'Language',
        '应用领域' => 'Application Fields',
        '应用案例' => 'Application Cases',
        '图片案例' => 'Image Case',
        '素材待补充' => 'Media Pending',
        '行业场景' => 'Industry Scenarios',
        '应用工艺' => 'Application Processes',
        '公司介绍' => 'Company Profile',
        '辰轩机器人专注于为制造企业提供定制化工业机器人自动化系统集成方案，帮助客户解决人工成本上升、生产效率瓶颈以及产品一致性控制等核心问题。' => 'ChenXuan Robotics focuses on customized industrial robot automation system integration for manufacturers, helping customers address rising labor costs, production efficiency bottlenecks and product consistency control.',
        '可根据客户实际工艺需求，设计并交付完整的自动化解决方案，涵盖焊接、打磨、喷涂、搬运、码垛、机床上下料及装配等多种工业应用场景，确保系统在真实生产环境中稳定、高效运行。' => 'Based on each customer’s real process needs, ChenXuan designs and delivers complete automation solutions covering welding, grinding, spraying, handling, palletizing, machine loading and unloading, assembly and other industrial scenarios, ensuring stable and efficient operation in real production environments.',
        '感谢您访问辰轩，这里汇聚了前沿定制自动化技术与行业需求。请问有什么我可以帮您？' => 'Thank you for visiting ChenXuan. Here you can explore advanced customized automation technology and industry needs. How can we help you?',
        '以客户为中心的全流程工程服务' => 'Customer-centered full-process engineering service',
        '自动化系统' => ' Automation System',
        '一站式自动化集成解决方案' => 'One-stop Automation Integration Solutions',
        '工业机器人与自动化集成解决方案' => 'Industrial Robot and Automation Integration Solutions',
        '智能集成解决方案' => 'Intelligent Integration Solutions',
        '智能制造集成解决方案' => 'Smart Manufacturing Integration Solutions',
        '焊接 · 打磨 · 喷涂 · 搬运 · 装配' => 'Welding · Grinding · Spraying · Handling · Assembly',
        '自动化 · 机器人技术 · 工艺开发 · 机器与控制' => 'Automation · Robotics · Process Development · Machine and Control',
        '工业机器人产品系列' => 'Industrial Robot Product Series',
        '协作机器人产品系列' => 'Collaborative Robot Product Series',
        '高负载' => 'High Payload',
        '高速度' => 'High Speed',
        '高精度' => 'High Precision',
        '复杂工况' => 'Complex Conditions',
        '安全协作' => 'Safe Collaboration',
        '灵活部署' => 'Flexible Deployment',
        '易于编程' => 'Easy Programming',
        '人机协同' => 'Human-robot Collaboration',
        '工程机械' => 'Construction Machinery',
        '工程机械行业' => 'Construction Machinery',
        '汽车及零部件' => 'Automotive and Parts',
        '汽车及零部件行业' => 'Automotive and Parts',
        '金属加工' => 'Metal Processing',
        '金属加工与钣金制造行业' => 'Metal Processing and Sheet Metal',
        '船舶和钢结构行业' => 'Shipbuilding and Steel Structures',
        '医疗设备行业（遥操作）' => 'Medical Device Industry (Teleoperation)',
        '物流仓储（AGV）' => 'Logistics and Warehousing (AGV)',
        '服务行业' => 'Service Industry',
        '智能制造' => 'Smart Manufacturing',
        '食品饮料与包装行业' => 'Food, Beverage and Packaging',
        'AGV智能搬运系统应用行业' => 'AGV Intelligent Handling Systems',
        '智慧商业场景' => 'Smart Commercial Scenarios',
        '智慧商业' => 'Smart Commerce',
        '一站式交钥匙工程' => 'One-stop Turnkey Engineering',
        '智能项目交付体系' => 'Intelligent Project Delivery System',
        '远程运维与技术支持' => 'Remote O&M and Technical Support',
        '交钥匙' => 'Turnkey',
        '项目交付' => 'Delivery',
        '远程运维' => 'Remote O&M',
        '焊接' => 'Welding',
        '喷涂' => 'Spraying',
        '搬运' => 'Handling',
        '切割' => 'Cutting',
        '折弯' => 'Bending',
        '点胶' => 'Dispensing',
        '上下料' => 'Loading and Unloading',
        '打磨' => 'Grinding',
        '冲压' => 'Stamping',
        '雕刻' => 'Engraving',
        '码垛' => 'Palletizing',
        '装配' => 'Assembly',
        '检测' => 'Inspection',
        '包装' => 'Packaging',
        '柔性抓取' => 'Flexible Gripping',
        '复合机器人' => 'Composite Robot',
        '协作与复合应用' => 'Collaborative and Composite Applications',
        '视觉防护' => 'Vision Protection',
        'Chenxuan Robot' => 'Chenxuan Robot',
        '焊接机器人' => 'Welding Robot',
        '喷涂机器人' => 'Spraying Robot',
        '搬运、码垛机器人' => 'Handling and Palletizing Robot',
        '切割机器人' => 'Cutting Robot',
        '抛光机器人' => 'Polishing Robot',
        '折弯机器人' => 'Bending Robot',
        '雕刻机器人' => 'Engraving Robot',
        '定位器和线性轨道' => 'Positioners and Linear Tracks',
        '协作焊接机器人' => 'Collaborative Welding Robot',
        '视觉机器人' => 'Vision Robot',
        '机床' => 'Machine Tool',
        '咖啡机' => 'Coffee Machine',
        '清洁机器人' => 'Cleaning Robot',
        '设备配件' => 'Equipment Accessories',
        '焊机' => 'Welding Machine',
        '焊枪' => 'Welding Torch',
        '案例展示' => 'Case Studies',
        '推动全球智能制造升级' => 'Advancing Smart Manufacturing Upgrades',
        '项目洞察' => 'Project Insights',
        '方案观察' => 'Solution Notes',
        '产品观察' => 'Product Notes',
        '智能制造洞察' => 'Smart Manufacturing Insights',
        '全部资料' => 'All Resources',
        '方案资料' => 'Solution Resources',
        '行业解决方案' => 'Industry Solutions',
        '工艺应用资料' => 'Process Application Resources',
        '服务资料' => 'Service Resources',
        '工艺培训' => 'Process Training',
        '运维支持' => 'O&M Support',
        '维护指南' => 'Maintenance Guides',
        '输入行业、工艺或资料名称' => 'Search by industry, process or resource name',
        '预约获取' => 'Request Access',
        '工程机械行业自动化集成方案说明' => 'Construction Machinery Automation Integration Brief',
        '汽车及零部件行业机器人应用说明' => 'Automotive and Parts Robot Application Brief',
        '金属加工与钣金制造自动化方案说明' => 'Metal Processing and Sheet Metal Automation Brief',
        '食品饮料与包装行业自动化方案说明' => 'Food, Beverage and Packaging Automation Brief',
        '焊接机器人工作站应用说明' => 'Welding Robot Workstation Application Brief',
        '打磨喷涂自动化单元说明' => 'Grinding and Spraying Automation Unit Brief',
        '搬运码垛与机床上下料应用说明' => 'Handling, Palletizing and Machine Loading Brief',
        '一站式交钥匙工程服务流程' => 'One-stop Turnkey Engineering Service Flow',
        '智能项目交付体系说明' => 'Intelligent Project Delivery System Brief',
        '机器人操作与维护培训大纲' => 'Robot Operation and Maintenance Training Outline',
        '工艺应用系统培训说明' => 'Process Application System Training Brief',
        '远程运维与技术支持说明' => 'Remote O&M and Technical Support Brief',
        '现场问题快速响应流程' => 'On-site Issue Rapid Response Flow',
        '自动化系统维护检查表' => 'Automation System Maintenance Checklist',
        '机器人工作站日常保养指南' => 'Robot Workstation Daily Maintenance Guide',
        '项目咨询' => 'Project Consultation',
        '提交自动化需求' => 'Submit Automation Requirement',
        '工程沟通' => 'Engineering Communication',
        '填写工艺与现场条件' => 'Provide Process and Site Conditions',
        '服务方向' => 'Service Focus',
        '焊接、打磨、喷涂、搬运、码垛、机床上下料及装配等工业应用场景' => 'Industrial application scenarios including welding, grinding, spraying, handling, palletizing, machine loading and assembly',
        '了解辰轩' => 'About ChenXuan',
        '在线提交需求' => 'Submit Requirement Online',
        '获取定制自动化方案沟通' => 'Discuss a Custom Automation Solution',
        '需求已收到，辰轩工程团队将尽快与您联系。' => 'Your requirement has been received. The ChenXuan engineering team will contact you shortly.',
        '了解解决方案' => 'Explore Solutions',
        '咨询项目' => 'Consult Project',
        '查看产品系列' => 'View Product Series',
        '服务体系' => 'Service System',
        '应用案例' => 'Application Cases',
        '提交需求' => 'Submit Request',
        '围绕真实工艺需求设计、交付并持续优化稳定高效的自动化系统。' => 'Design, deliver and continuously optimize stable automation systems around real process needs.',
        '具备高负载、高速度与高精度的核心优势，适用于复杂严苛的工业生产环境。' => 'Built for high payload, high speed and high precision in demanding industrial production environments.',
        '具备安全协作、灵活部署与易于编程的特点，可与人类在同一工作空间内安全配合完成作业。' => 'Safe to collaborate with people, flexible to deploy and easy to program in shared workspaces.',
        '钢结构与重型装备行业' => 'Steel Structures and Heavy Equipment',
        '应用于挖掘机、装载机、起重机、叉车、农机及重型设备零部件生产。' => 'For excavators, loaders, cranes, forklifts, agricultural machinery and heavy equipment parts.',
        '应用于保险杠喷涂、动力总成装配、电池包制造、车身焊接、零部件加工、搬运、检测及自动化生产。' => 'For bumper spraying, powertrain assembly, battery packs, body welding, parts processing, handling, inspection and automated production.',
        '应用于钣金加工、机箱机柜、配电柜、电梯部件、暖通设备、厨房设备、医疗设备外壳及五金制品。' => 'For sheet metal, cabinets, distribution boxes, elevator parts, HVAC equipment, kitchen equipment, medical housings and hardware products.',
        '应用于食品加工、饮料灌装、乳制品、酒类、调味品、烘焙食品、宠物食品、日化包装及仓储物流。' => 'For food processing, beverage filling, dairy, liquor, condiments, baked goods, pet food, daily chemical packaging and warehouse logistics.',
        '应用于建筑钢结构、桥梁工程、风电设备、压力容器、矿山机械、港口机械、工程机械、船舶及海洋工程。' => 'For building steel structures, bridges, wind power equipment, pressure vessels, mining machinery, port machinery, construction machinery, ships and offshore engineering.',
        '面向自动化物料搬运、仓储配送和生产物流，帮助企业实现厂内物流无人化和智能化。' => 'For automated material handling, warehouse distribution and production logistics, enabling unmanned and intelligent in-plant logistics.',
        '应用于机器人咖啡工作站、智能饮品吧台、无人零售终端、智慧餐厅、智能厨房和酒店服务。' => 'For robot coffee workstations, smart beverage bars, unmanned retail terminals, smart restaurants, smart kitchens and hotel services.',
        '从方案设计到现场交付的完整自动化系统集成。' => 'Complete automation system integration from solution design to on-site delivery.',
        '标准化管理 + 非标定制，保障系统稳定高效运行。' => 'Standardized management plus custom engineering to keep systems stable and efficient.',
        '快速响应现场问题，持续优化系统性能。' => 'Fast response to site issues and continuous system performance optimization.',
        '定制自动化让复杂工艺稳定落地' => 'Custom Automation Makes Complex Processes Stable',
        '围绕焊接、打磨、喷涂、搬运、装配等工艺，辰轩持续沉淀智能制造项目经验。' => 'ChenXuan keeps building project experience around welding, grinding, spraying, handling, assembly and other smart manufacturing processes.',
        '从工艺需求出发规划机器人集成系统' => 'Plan Robot Integration Systems from Process Needs',
        '以真实产线节拍、质量一致性和人员协作为核心，设计可交付、可维护、可扩展的自动化方案。' => 'Design deliverable, maintainable and scalable automation around real line takt time, quality consistency and human collaboration.',
        'AGV搬运系统助力厂内物流无人化' => 'AGV Handling Systems Enable Unmanned In-plant Logistics',
        '通过自动化物料搬运、仓储配送和生产物流协同，提升制造现场流转效率。' => 'Improve manufacturing flow efficiency through automated material handling, warehousing, distribution and production logistics.',
        '智慧商业场景中的机器人工作站应用' => 'Robot Workstations in Smart Commercial Scenarios',
        '机器人咖啡、智能饮品、无人零售和智慧餐饮正在打开更灵活的服务体验。' => 'Robot coffee, smart beverages, unmanned retail and smart dining are opening more flexible service experiences.',
        '工业机器人与协作机器人的场景分工' => 'Scenario Roles of Industrial and Collaborative Robots',
        '高负载、高速度、高精度与安全协作、灵活部署共同构成辰轩的产品组合。' => 'High payload, speed and precision work alongside safe collaboration and flexible deployment in ChenXuan product planning.',
        '焊接自动化工作站' => 'Welding Automation Workstation',
        '面向结构件、车身及金属工件的焊接工艺，提升节拍与焊缝一致性。' => 'For structural parts, vehicle bodies and metal workpieces, improving takt time and weld consistency.',
        '打磨喷涂自动化单元' => 'Grinding and Spraying Automation Unit',
        '适配表面处理、涂装与后处理场景，减少人工强依赖。' => 'For surface treatment, coating and post-processing scenarios, reducing dependence on manual labor.',
        '搬运码垛系统' => 'Handling and Palletizing System',
        '围绕生产流转、仓储配送和包装下线实现稳定搬运。' => 'Stable handling for production flow, warehouse distribution and packaging off-line processes.',
        '机床上下料与装配系统' => 'Machine Loading and Assembly System',
        '结合节拍、工装和控制系统，完成柔性上下料与装配作业。' => 'Combines takt time, fixtures and control systems for flexible loading and assembly.',
        '需要为您的产线定制自动化方案？' => 'Need a custom automation solution for your production line?',
        '告诉我们工艺、产品、节拍、现场条件和自动化目标，辰轩将协助您梳理可落地的集成方案。' => 'Tell us your process, products, takt time, site conditions and automation goals. ChenXuan will help shape an executable integration plan.',
        '标准化管理 + 非标定制' => 'Standardized Management + Custom Engineering',
        '辰轩在项目交付中兼顾标准流程与现场差异，从方案评估、工艺验证、设备集成、控制调试到现场培训，持续关注系统稳定性与生产效率。' => 'ChenXuan balances standard project flow with site-specific needs, covering solution evaluation, process validation, equipment integration, control commissioning and on-site training while focusing on system stability and production efficiency.',
        '让自动化系统在真实生产环境中稳定、高效运行' => 'Keep automation systems stable and efficient in real production environments',
        '需求分析' => 'Requirement Analysis',
        '梳理工艺、节拍、产品与现场约束。' => 'Clarify process, takt time, products and site constraints.',
        '方案设计' => 'Solution Design',
        '匹配机器人、工装、控制与安全策略。' => 'Match robots, fixtures, control and safety strategies.',
        '系统集成' => 'System Integration',
        '完成设备、软件、工艺和产线接口协同。' => 'Coordinate equipment, software, process and line interfaces.',
        '现场交付' => 'On-site Delivery',
        '调试验收并保障系统进入稳定生产。' => 'Commission, accept and move the system into stable production.',
        '快速响应现场问题并持续优化系统性能。' => 'Respond quickly to site issues and continuously optimize system performance.',
        '应用培训' => 'Application Training',
        '提供操作、维护与工艺应用培训。' => 'Provide operation, maintenance and process application training.',
        '想了解适合您的自动化方案？' => 'Want to understand the right automation solution?',
        '提交工艺需求和现场条件，辰轩将协助您判断方案方向。' => 'Submit process requirements and site conditions so ChenXuan can help assess the solution direction.',
        '需要项目交付与运维支持？' => 'Need delivery and O&M support?',
        '从方案设计到现场交付，再到培训与远程支持，辰轩提供完整工程服务。' => 'From solution design to on-site delivery, training and remote support, ChenXuan provides complete engineering service.',
        '工艺、节拍、现场条件' => 'Process, takt time and site conditions',
        '辰轩围绕自动化、机器人技术、工艺开发、机器与控制，为制造企业提供从需求分析到现场交付的完整工程能力。' => 'ChenXuan provides end-to-end engineering capabilities from requirement analysis to on-site delivery across automation, robotics, process development, machines and controls.',
        '机器人产品系列' => 'Robot Product Series',
        '行业应用场景' => 'Industry Application Scenarios',
        '工程服务模块' => 'Engineering Service Modules',
        '机器人咖啡工作站 · 智能饮品吧台 · 无人零售终端 · 智慧餐厅' => 'Robot Coffee Workstations · Smart Beverage Bars · Unmanned Retail Terminals · Smart Restaurants',
        '辰轩将机器人技术与商业服务场景结合，面向机器人咖啡工作站、智能饮品吧台、无人零售终端、智慧餐厅、智能厨房和酒店服务，提供可落地的自动化集成方案。' => 'ChenXuan combines robotics with commercial service scenarios, providing executable automation integration solutions for robot coffee workstations, smart beverage bars, unmanned retail terminals, smart restaurants, smart kitchens and hotel services.',
        '机器人咖啡工作站' => 'Robot Coffee Workstation',
        '从点单、制作到出品的自动化饮品服务单元' => 'Automated beverage service unit from ordering to production and serving',
        '智能饮品吧台' => 'Smart Beverage Bar',
        '适配多品类饮品制作与标准化出杯流程' => 'Supports multiple beverage categories and standardized serving workflows',
        '无人零售终端' => 'Unmanned Retail Terminal',
        '结合自动化取放、补货与交互体验' => 'Combines automated pickup, replenishment and interactive experience',
        '智慧餐厅与厨房' => 'Smart Restaurant and Kitchen',
        '面向后厨、出餐和服务流程的机器人应用' => 'Robot applications for kitchens, serving and service flows',
        '酒店服务场景' => 'Hotel Service Scenario',
        '围绕配送、接待和服务体验进行智能升级' => 'Smart upgrades for delivery, reception and service experience',
        '从商业体验到稳定运营' => 'From Commercial Experience to Stable Operations',
        '场景设计' => 'Scenario Design',
        '机器人集成' => 'Robot Integration',
        '控制系统' => 'Control System',
        '操作培训' => 'Operation Training',
        '持续优化' => 'Continuous Optimization',
        '咨询智慧商业自动化方案' => 'Consult on Smart Commercial Automation Solutions',
        '沟通内容' => 'Discussion Scope',
        '场景、流程、设备、空间与运营目标' => 'Scenarios, processes, equipment, space and operation goals',
        '提交方式' => 'Submission Method',
        '填写右侧需求表单' => 'Fill out the requirement form',
        '场景类型' => 'Scenario Type',
        '智慧餐厅' => 'Smart Restaurant',
        '智能厨房' => 'Smart Kitchen',
        '酒店服务' => 'Hotel Service',
        '项目阶段' => 'Project Stage',
        '规划中/改造中/待落地' => 'Planning / Retrofit / Ready to launch',
        '咨询目的' => 'Consultation Purpose',
        '了解方案' => 'Understand Solution',
        '项目评估' => 'Project Evaluation',
        '合作沟通' => 'Cooperation Discussion',
        '请描述业务场景、设备流程、空间限制或运营目标' => 'Describe the business scenario, equipment process, space limits or operation goals',
        '挖掘机铲斗焊接' => 'Excavator Bucket Welding',
        '装载机铲斗焊接' => 'Loader Bucket Welding',
        '农机车架焊接' => 'Agricultural Machinery Frame Welding',
        '车辆车架焊接' => 'Vehicle Frame Welding',
        '圆管法兰焊接' => 'Round Tube Flange Welding',
        '钢筋焊接' => 'Rebar Welding',
        '焊接气液分离器工作站' => 'Gas-liquid Separator Welding Workstation',
        '集装箱门板激光跟踪' => 'Container Door Laser Tracking',
        '集装箱焊接' => 'Container Welding',
        '托辊支架焊接' => 'Idler Bracket Welding',
        '挖掘机大臂焊接' => 'Excavator Boom Welding',
        '拖车焊接' => 'Trailer Welding',
        '铲斗焊接' => 'Bucket Welding',
        '车架焊接' => 'Frame Welding',
        '保险杠喷涂工作站' => 'Bumper Spraying Workstation',
        '车桥焊接工作站' => 'Axle Welding Workstation',
        '车身切割工作站' => 'Body Cutting Workstation',
        '发动机缸体喷涂工作站' => 'Engine Block Spraying Workstation',
        '密封涂胶' => 'Sealing Adhesive Application',
        '汽车焊装' => 'Automotive Welded Assembly',
        '汽车钣金涂胶' => 'Automotive Sheet Metal Gluing',
        '汽车车架焊接工作站' => 'Automotive Frame Welding Workstation',
        '吸震器取料工作站' => 'Shock Absorber Picking Workstation',
        '制动鼓生产线' => 'Brake Drum Production Line',
        '汽车仪表盘焊接工作站' => 'Dashboard Welding Workstation',
        '方向盘焊接工作站' => 'Steering Wheel Welding Workstation',
        '汽车配件电阻焊工作站' => 'Automotive Parts Resistance Welding Workstation',
        'AGV铝管加工上下料' => 'AGV Aluminum Tube Loading and Unloading',
        '船用轴激光熔覆工作站' => 'Marine Shaft Laser Cladding Workstation',
        'LED灯配件挂线喷粉工作站' => 'LED Accessory Hanging and Powder Spraying Workstation',
        '电柜箱体焊接工作站' => 'Electrical Cabinet Welding Workstation',
        '防爆箱上下料工作站' => 'Explosion-proof Box Loading and Unloading',
        '滑板小车铝合金焊接工作站' => 'Aluminum Trolley Welding Workstation',
        '激光切管机工作站' => 'Laser Tube Cutting Workstation',
        '机器人折弯与冲压工作站' => 'Robot Bending and Stamping Workstation',
        '健身器材加工工作站' => 'Fitness Equipment Processing Workstation',
        '配电箱激光焊工作站' => 'Distribution Box Laser Welding Workstation',
        '索具机上下料工作站' => 'Rigging Machine Loading and Unloading',
        '异型管件缠绕工作站' => 'Special-shaped Tube Winding Workstation',
        'H型钢拱架焊接工作站' => 'H-beam Arch Welding Workstation',
        '钢结构焊接工作站' => 'Steel Structure Welding Workstation',
        '协作钢结构焊接工作站' => 'Collaborative Steel Structure Welding Workstation',
        '船体焊接工作站' => 'Hull Welding Workstation',
        '工业清洁机器人' => 'Industrial Cleaning Robot',
        '咖啡机器人' => 'Coffee Robot',
        '人形机器人工作站' => 'Humanoid Robot Workstation',
    ];
}

function chenxuan_chinese_term_en_map() {
    return chenxuan_content_en_map() + [
        '碳钢' => 'Carbon Steel',
        '不锈钢' => 'Stainless Steel',
        '铝合金' => 'Aluminum Alloy',
        '镀锌板' => 'Galvanized Sheet',
        '铜' => 'Copper',
        '特殊合金' => 'Special Alloys',
        '金属' => 'Metal',
        '塑料' => 'Plastic',
        '木材' => 'Wood',
        '玻璃' => 'Glass',
        '陶瓷' => 'Ceramic',
        '复合材料' => 'Composite Materials',
        '零部件' => 'Parts',
        '物料' => 'Materials',
        '石材' => 'Stone',
        '泡沫' => 'Foam',
        '板材' => 'Sheet Material',
        '纸箱' => 'Cartons',
        '袋装' => 'Bagged Materials',
        '桶装产品' => 'Barreled Products',
        '工业产品' => 'Industrial Products',
        '非金属' => 'Non-metal',
        '自动打磨' => 'Automatic Grinding',
        '表面抛光' => 'Surface Polishing',
        '复合材料处理' => 'Composite Material Processing',
        '钣金折弯' => 'Sheet Metal Bending',
        '冲压上下料' => 'Stamping Loading and Unloading',
        '柔性加工' => 'Flexible Processing',
        '木材雕刻' => 'Wood Engraving',
        '金属雕刻' => 'Metal Engraving',
        '石材雕刻' => 'Stone Engraving',
        '多角度翻转' => 'Multi-angle Turnover',
        '作业范围扩展' => 'Work Range Expansion',
        '焊接效率提升' => 'Welding Efficiency Improvement',
        '安全协同' => 'Safe Collaboration',
        '重复作业' => 'Repetitive Work',
        '危险工位替代' => 'Hazardous Station Replacement',
        '移动底盘' => 'Mobile Chassis',
        '机械臂抓取' => 'Robot Arm Picking',
        '自主搬运' => 'Autonomous Handling',
        '目标识别' => 'Target Recognition',
        '精准抓取' => 'Precise Picking',
        '定位检测' => 'Positioning Inspection',
        '切削加工' => 'Cutting Machining',
        '钻孔铣削' => 'Drilling and Milling',
        '精密零件制造' => 'Precision Parts Manufacturing',
        '无人值守' => 'Unattended Operation',
        '标准化出杯' => 'Standardized Serving',
        '24小时服务' => '24-hour Service',
        '工业清洁' => 'Industrial Cleaning',
        '标准化作业' => 'Standardized Operation',
        '无人化运行' => 'Unmanned Operation',
        '系统稳定运行' => 'Stable System Operation',
        '产品中心' => 'Products',
        '资料中心' => 'Download Center',
        '下载中心' => 'Download Center',
        '新闻中心' => 'News',
        '联系辰轩' => 'Contact ChenXuan',
        '关于辰轩' => 'About ChenXuan',
    ];
}

function chenxuan_translate_chinese_to_english($text) {
    $map = chenxuan_chinese_term_en_map();
    if (isset($map[$text])) {
        return $map[$text];
    }

    $terms = $map;
    uksort($terms, function($a, $b) {
        return mb_strlen($b, 'UTF-8') <=> mb_strlen($a, 'UTF-8');
    });

    $translated = $text;
    foreach ($terms as $zh => $en) {
        if ($zh !== '') {
            $translated = str_replace($zh, $en, $translated);
        }
    }

    return preg_match('/\p{Han}/u', $translated) ? '' : trim($translated);
}

function chenxuan_legacy_product_category_series($term_name, $context = '', $excerpt_context = '') {
    $term = trim((string) $term_name);
    if (is_array($context)) {
        $title_context = $context['title'] ?? '';
        $excerpt_context = $context['excerpt'] ?? $excerpt_context;
    } else {
        $title_context = $context;
    }

    $normalize_text = function($value) {
        return strtolower(html_entity_decode(wp_strip_all_tags((string) $value), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    };
    $term_text = $normalize_text($term);
    $title_text = $normalize_text($title_context);
    $excerpt_text = $normalize_text($excerpt_context);

    $has = function($text, $needles) {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && strpos($text, $needle) !== false) {
                return true;
            }
        }
        return false;
    };
    $title_has = function($needles) use ($has, $title_text) {
        return $has($title_text, $needles);
    };
    $term_has = function($needles) use ($has, $term_text) {
        return $has($term_text, $needles);
    };
    $all_has = function($needles) use ($has, $term_text, $title_text, $excerpt_text) {
        return $has($term_text . ' ' . $title_text . ' ' . $excerpt_text, $needles);
    };

    if ($title_has(['gripper', 'suction cup', 'torque sensor', 'force-sensor', 'robot joint', 'joint module', 'lifting kit', 'end effector', 'welding torch', 'welding gun', 'welder power', 'power source', 'wire feeder', 'equipment accessory', 'accessory', 'accessories', 'spare part'])) {
        return 'accessories';
    }
    if ($title_has(['positioner', 'turning table', 'turntable', 'rotary table', 'linear track', 'gantry rail', 'rotating table', 'welding turntable'])) {
        return 'positioner';
    }
    if ($title_has(['coffee', 'barista', 'beverage', 'drink'])) {
        return 'coffee';
    }
    if ($title_has(['cleaning', 'cleaner', 'sweeper', 'floor scrubber'])) {
        return 'cleaning';
    }
    if ($title_has(['vision', 'camera', 'inspection', '3d visual', 'visual positioning', 'seam tracking'])) {
        return 'vision';
    }
    if ($title_has(['spray', 'spraying', 'painting', 'coating', 'paint sprayer', 'cream depositor', 'depositor'])) {
        return 'spraying';
    }
    if ($title_has(['polishing', 'grinding', 'sanding', 'deburr', 'surface finishing', 'surface treatment'])) {
        return 'polishing';
    }
    if ($title_has(['cutting', 'cutter', 'laser cut', 'flame cut', 'tube cutter'])) {
        return 'cutting';
    }
    if ($title_has(['bending', 'press brake', 'folding', 'stamping'])) {
        return 'bending';
    }
    if ($title_has(['engraving', 'carving', '5-axis mechanical design'])) {
        return 'engraving';
    }
    if ($title_has(['pallet', 'palletizing', 'loading', 'unloading', 'material handling', 'pick and place', 'pick-and-place', 'warehouse', 'stacker', 'bin', 'sorting', 'conveying', 'transport', 'logistics', 'packaging'])) {
        return 'handling';
    }
    if ($title_has(['cnc', 'machine tool', 'machining center', 'milling', 'drilling', 'lathe', 'wet wipes making'])) {
        return 'machine-tool';
    }
    if ($title_has(['collaborative welding', 'welding cobot', 'cobot welding', 'welding robot system', 'welding robot', 'robotic welder', 'metal joining'])) {
        return $term === 'Collaborative Robot' || $title_has(['cobot', 'collaborative']) ? 'cobot-welding' : 'welding';
    }
    if ($term === 'Collaborative Robot' && $title_has(['scara', 'dual-arm', 'dispensing', 'gluing', 'sealing', 'screw locking', 'assembly', 'pick and place', 'pick-and-place'])) {
        return 'composite';
    }
    if ($title_has(['collaborative', 'cobot', 'scara', 'dual-arm', 'dispensing', 'gluing', 'sealing', 'screw locking', 'assembly', 'parallel', 'delta'])) {
        return 'composite';
    }
    if ($title_has(['welding', 'welder', 'weld'])) {
        return $term === 'Collaborative Robot' || $title_has(['cobot', 'collaborative']) ? 'cobot-welding' : 'welding';
    }
    if (($term === 'Al Service Robots' || $term === 'AI Service Robots') && $all_has(['coffee', 'beverage', 'drink'])) {
        return 'coffee';
    }
    if (($term === 'Al Service Robots' || $term === 'AI Service Robots') && $all_has(['cleaning', 'cleaner', 'sweeper', 'floor scrubber'])) {
        return 'cleaning';
    }

    $map = [
        'Positioner and Linear Track' => 'positioner',
        'Collaborative Robot' => 'composite',
        'Welding Robot' => 'welding',
        'Bending Robots' => 'bending',
        'Handling,Palletizing' => 'handling',
        'Loading/Unloading Robot' => 'handling',
        'Painting Robots' => 'spraying',
        'Cutting Robot' => 'cutting',
        'Engraving Robots' => 'engraving',
        'Machine Tool Equipment' => 'machine-tool',
        'AI Service Robots' => 'cleaning',
        'Al Service Robots' => 'cleaning',
        'Parallel Robots' => 'composite',
    ];

    return $map[$term] ?? 'welding';
}

function chenxuan_legacy_series_label($context = '') {
    $context = strtolower((string) $context);
    $labels = [
        'positioner' => '定位器和线性轨道',
        'cobot-welding' => '协作焊接机器人',
        'welding' => '焊接机器人',
        'spraying' => '喷涂机器人',
        'handling' => '搬运码垛机器人',
        'cutting' => '切割机器人',
        'polishing' => '抛光机器人',
        'bending' => '折弯机器人',
        'engraving' => '雕刻机器人',
        'composite' => '复合机器人',
        'vision' => '视觉机器人',
        'machine-tool' => '机床自动化设备',
        'coffee' => '咖啡服务机器人',
        'cleaning' => '清洁机器人',
        'accessories' => '自动化设备配件',
    ];

    foreach ($labels as $slug => $label) {
        if (strpos($context, $slug) !== false) {
            return $label;
        }
    }

    if (strpos($context, 'positioner') !== false || strpos($context, 'linear track') !== false || strpos($context, 'turning') !== false || strpos($context, 'rotary') !== false) {
        return '定位器和线性轨道';
    }
    if (strpos($context, 'parallel') !== false || strpos($context, 'delta') !== false) {
        return '并联机器人';
    }
    if (strpos($context, 'welding') !== false || strpos($context, 'welder') !== false) {
        return '焊接机器人';
    }
    if (strpos($context, 'painting') !== false || strpos($context, 'spraying') !== false || strpos($context, 'coating') !== false) {
        return '喷涂机器人';
    }
    if (strpos($context, 'cutting') !== false) {
        return '切割机器人';
    }
    if (strpos($context, 'bending') !== false || strpos($context, 'stamping') !== false || strpos($context, 'press') !== false) {
        return '折弯机器人';
    }
    if (strpos($context, 'engraving') !== false) {
        return '雕刻机器人';
    }
    if (strpos($context, 'handling') !== false || strpos($context, 'palletizing') !== false || strpos($context, 'loading') !== false || strpos($context, 'unloading') !== false) {
        return '搬运码垛机器人';
    }
    if (strpos($context, 'machine tool') !== false || strpos($context, 'packing') !== false || strpos($context, 'packaging') !== false || strpos($context, 'wrapping') !== false) {
        return '自动化设备';
    }

    return '工业机器人自动化产品';
}

function chenxuan_legacy_summary_for_context($context = '') {
    $context = strtolower((string) $context);
    if (strpos($context, 'positioner') !== false || strpos($context, 'linear track') !== false || strpos($context, 'turning') !== false || strpos($context, 'rotary') !== false) {
        return '适用于机器人焊接、装配及工件翻转定位场景，支持稳定承载、精准旋转和多角度协同作业，帮助产线提升加工效率与一致性。';
    }
    if (strpos($context, 'parallel') !== false || strpos($context, 'delta') !== false) {
        return '适用于高速分拣、抓取、包装和轻量搬运场景，兼顾速度、精度与柔性部署，帮助客户搭建稳定高效的自动化单元。';
    }
    if (strpos($context, 'welding') !== false || strpos($context, 'welder') !== false) {
        return '适用于工业焊接自动化场景，可与机器人、夹具、变位机和控制系统协同工作，提升焊接效率、焊缝一致性和产线稳定性。';
    }
    if (strpos($context, 'painting') !== false || strpos($context, 'spraying') !== false || strpos($context, 'coating') !== false) {
        return '适用于工业喷涂与表面处理场景，可实现稳定喷涂轨迹和均匀覆盖，减少人工依赖并提升表面质量。';
    }
    if (strpos($context, 'cutting') !== false) {
        return '适用于金属及非金属材料的自动切割加工，支持稳定轨迹控制和高精度作业，帮助提升加工效率与成品一致性。';
    }
    if (strpos($context, 'bending') !== false || strpos($context, 'stamping') !== false || strpos($context, 'press') !== false) {
        return '适用于钣金折弯、冲压和柔性加工场景，可配合设备完成自动上下料与稳定加工，减少人工操作强度。';
    }
    if (strpos($context, 'engraving') !== false) {
        return '适用于木材、金属、石材、塑料及复合材料的自动化雕刻加工，帮助客户提升加工精度和生产一致性。';
    }
    if (strpos($context, 'handling') !== false || strpos($context, 'palletizing') !== false || strpos($context, 'loading') !== false || strpos($context, 'unloading') !== false) {
        return '适用于搬运、码垛、上下料及产线物流场景，帮助提升物料流转效率、降低人工强度并保持连续生产。';
    }
    if (strpos($context, 'machine tool') !== false || strpos($context, 'packing') !== false || strpos($context, 'packaging') !== false || strpos($context, 'wrapping') !== false) {
        return '适用于自动化设备与工艺配套场景，可与机器人系统协同完成稳定生产，满足定制化产线集成需求。';
    }
    if (strpos($context, 'cleaning') !== false || strpos($context, 'service') !== false || strpos($context, 'coffee') !== false) {
        return '适用于智能服务与无人化作业场景，可结合移动、识别和执行单元实现稳定、标准化运行。';
    }

    return '面向工业机器人与自动化集成场景，可根据客户工艺需求进行系统匹配，帮助提升效率、质量一致性和现场稳定运行。';
}

function chenxuan_translate_legacy_english_to_chinese($text, $context = '') {
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }

    if (preg_match('/\p{Han}/u', $text)) {
        return $text;
    }

    $combined_context = $context . ' ' . $text;
    if (mb_strlen($text, 'UTF-8') > 86 || preg_match('/[.!?;]/', $text)) {
        return chenxuan_legacy_summary_for_context($combined_context);
    }

    $terms = [
        'Positioner and Linear Track' => '定位器和线性轨道',
        'Collaborative Robot' => '协作机器人',
        'Welding Robot' => '焊接机器人',
        'Bending Robots' => '折弯机器人',
        'Handling,Palletizing' => '搬运码垛机器人',
        'Loading/Unloading Robot' => '上下料机器人',
        'Painting Robots' => '喷涂机器人',
        'Cutting Robot' => '切割机器人',
        'Engraving Robots' => '雕刻机器人',
        'Machine Tool Equipment' => '机床自动化设备',
        'AI Service Robots' => '智能服务机器人',
        'Al Service Robots' => '智能服务机器人',
        'Parallel Robots' => '并联机器人',
        'High Precision Industrial Parallel Manipulator Delta Robot Automated Handling' => '高精度工业并联机器人自动搬运系统',
        'Custom Industrial Parallel Robot High Precision Delta Robot' => '定制高精度工业并联机器人',
        'High Speed Delta Parallel Robot 4 Axis Pick and Place Robotic Arm' => '高速四轴德尔塔并联抓取机器人',
        'Gantry Rail Mounted Robotic Welding System for Heavy Structure Fabrication' => '重型结构件龙门导轨式机器人焊接系统',
        'Gantry Rail Mounted' => '龙门导轨式',
        'Robotic Welding System' => '机器人焊接系统',
        'Heavy Structure Fabrication' => '重型结构件制造',
        'Heavy Duty' => '重载',
        'Welding Positioner' => '焊接变位机',
        'Industrial Rotary' => '工业旋转式',
        'Rotary Welding Turning Table' => '旋转焊接转台',
        '360 Degree Rotation' => '360度旋转',
        'Servo Motor' => '伺服电机',
        'Dual-axis' => '双轴',
        'Dual Axis' => '双轴',
        'Single-axis' => '单轴',
        'Single Axis' => '单轴',
        'U-Type' => 'U型',
        'Pipe Welding Flange' => '管件法兰焊接',
        'Precision Sliding Table' => '精密滑台',
        'Thickened Frame' => '加厚框架',
        'Parallel Manipulator' => '并联机械手',
        'Parallel Robot' => '并联机器人',
        'Delta Parallel Robot' => '德尔塔并联机器人',
        'Delta Robot' => '德尔塔机器人',
        'Pick and Place' => '抓取放置',
        'Robotic Arm' => '机器人手臂',
        'Automated Handling' => '自动搬运',
        'Automatic Handling' => '自动搬运',
        'Custom Industrial' => '定制工业',
        'High Precision' => '高精度',
        'High Speed' => '高速',
        'Tube Film Packaging Machine' => '管膜包装机',
        'Automatic Toilet Roll Paper Wrapping Packing Machine' => '全自动卷纸包装机',
        'Industrial Carton Cargo Wrapping Equipment' => '工业纸箱货物包装设备',
        'Presentation Video' => '展示视频',
        'Product Presentation' => '产品展示',
        'Product application scenario' => '产品应用场景',
        'Spraying' => '喷涂',
        'Painting' => '喷涂',
        'Coating' => '涂装',
        'Cutting' => '切割',
        'Engraving' => '雕刻',
        'Bending' => '折弯',
        'Loading' => '上料',
        'Unloading' => '下料',
        'Palletizing' => '码垛',
        'Handling' => '搬运',
        'Machine Tool' => '机床',
        'Carton' => '纸箱',
        'Wrapping' => '包装',
        'Packing' => '包装',
        'Packaging' => '包装',
        'Robot' => '机器人',
        'Robotic' => '机器人',
        'Manipulator' => '机械手',
        'Industrial' => '工业',
        'Automatic' => '自动化',
        'Automated' => '自动化',
        'Precision' => '精密',
        'Speed' => '高速',
        'Arm' => '手臂',
        'Chenxuan' => 'ChenXuan',
        'ChenXuan' => 'ChenXuan',
        'Product' => '产品',
        'System' => '系统',
        'Equipment' => '设备',
        'Machine' => '设备',
        'Factory' => '工厂',
        'Supplier' => '供应商',
        'China' => '中国',
        'Our' => '',
        'Widely applicable' => '广泛适用',
    ];

    uksort($terms, function($a, $b) {
        return strlen($b) <=> strlen($a);
    });

    $translated = $text;
    foreach ($terms as $en => $zh) {
        $translated = str_ireplace($en, $zh, $translated);
    }

    $translated = preg_replace('/\s+/', ' ', trim((string) $translated));
    $translated = str_replace([' ,', ' .', ' - ', '-'], ['，', '。', '', ''], $translated);
    $translated = trim($translated, " \t\n\r\0\x0B,.;:/");

    preg_match_all('/[A-Za-z]{3,}/', $translated, $matches);
    if (count($matches[0]) > 1 || mb_strlen($translated, 'UTF-8') > 48) {
        return chenxuan_legacy_series_label($combined_context) . '自动化产品';
    }

    return $translated !== '' ? $translated : chenxuan_legacy_series_label($combined_context);
}

function chenxuan_legacy_localize($text, $context = '') {
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }

    $lang = chenxuan_current_lang_code();
    if ($lang === 'zh' || $lang === 'zh_tw') {
        $zh = chenxuan_translate_legacy_english_to_chinese($text, $context);
        return $lang === 'zh_tw' ? chenxuan_to_traditional(chenxuan_normalize_brand_copy($zh)) : chenxuan_normalize_brand_copy($zh);
    }

    return chenxuan_l($text);
}

function chenxuan_locale_profiles() {
    return [
        'ja' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuanは、実際の生産現場に合わせて、工程計画、ロボット統合、制御システム、現場導入、継続サポートまでを一体で提供します。',
            'topics' => [
                'product' => '産業用ロボットと協働ロボットを実際の工程に合わせ、安定した自動化システムとして導入します。',
                'solution' => '業界経験をもとに、溶接、研磨、塗装、搬送、組立などの工程へ実装可能な自動化ソリューションを提供します。',
                'service' => '要件分析、方案設計、システム統合、現場導入、教育、リモート保守まで一貫して支援します。',
                'case' => 'この事例では、ロボット、治具、制御、現場工程を組み合わせ、生産効率と品質の安定性を高めています。',
                'contact' => '工程、製品、タクト、現場条件、自動化目標をご記入ください。ChenXuanのエンジニアが確認します。',
                'download' => '自動化プロジェクト、業界ソリューション、工程応用、運用保守に関する資料を提供します。',
                'news' => 'ChenXuanは、自動化とスマート製造に関するプロジェクト経験と業界洞察を共有します。',
                'smart' => '商業サービスの現場にロボット技術を組み込み、安定運用できる自動化体験を提供します。',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'ChenXuanロボティクス',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'ChenXuanロボット',
                'Log in' => 'ログイン',
                'Register' => '登録',
                'Search' => '検索',
                'All' => 'すべて',
                'Learn More' => '詳しく見る',
                'Explore More' => 'さらに見る',
                'View All' => 'すべて見る',
                'Read More' => '続きを読む',
                'Read Now' => '今すぐ読む',
                'Load More' => 'さらに読み込む',
                'View Details' => '詳細を見る',
                'Contact Us' => 'お問い合わせ',
                'Submit Request' => '要件を送信',
                'Consult Online' => 'オンライン相談',
                'Book a Discussion' => '相談を予約',
                'Back to Top' => 'トップへ戻る',
                'Name' => '氏名',
                'Enter your name' => '氏名を入力してください',
                'Phone' => '電話番号',
                'Enter your phone' => '電話番号を入力してください',
                'Enter phone number' => '電話番号を入力してください',
                'Email' => 'メール',
                'Enter your email' => 'メールアドレスを入力してください',
                'Enter email' => 'メールアドレスを入力してください',
                'Company' => '会社名',
                'Enter company name' => '会社名を入力してください',
                'Requirements' => '要件',
                'Please select' => '選択してください',
                'Other' => 'その他',
                'I have read and agree to' => '以下を読み、同意します',
                'Privacy Policy' => 'プライバシーポリシー',
                'User Agreement' => '利用規約',
                'Cookie Policy' => 'Cookieポリシー',
                'Accept' => '同意',
                'Decline' => '拒否',
                'No results found' => '検索結果はありません',
                'Found %s results for "%s"' => '"%2$s" の検索結果が %1$s 件見つかりました',
                'Page unavailable' => 'ページを表示できません',
                'Back Home' => 'ホームへ戻る',
                'Products' => '製品',
                'Solutions' => 'ソリューション',
                'News' => 'ニュース',
                'Download Center' => 'ダウンロードセンター',
                'Case Studies' => '導入事例',
                'Service & Support' => 'サービスとサポート',
            ],
            'terms' => [
                'Industrial Robots' => '産業用ロボット',
                'Industrial Robot' => '産業用ロボット',
                'Collaborative Robots' => '協働ロボット',
                'Collaborative Robot' => '協働ロボット',
                'Robot Product Series' => 'ロボット製品シリーズ',
                'Product Series' => '製品シリーズ',
                'Robot' => 'ロボット',
                'Robots' => 'ロボット',
                'Automation' => '自動化',
                'Integration' => '統合',
                'Solution' => 'ソリューション',
                'Solutions' => 'ソリューション',
                'Industry' => '業界',
                'Application' => '用途',
                'Applications' => '用途',
                'Process' => '工程',
                'Processes' => '工程',
                'Service' => 'サービス',
                'Support' => 'サポート',
                'Download' => 'ダウンロード',
                'Resources' => '資料',
                'Training' => 'トレーニング',
                'Maintenance' => '保守',
                'Project' => 'プロジェクト',
                'Workstation' => 'ワークステーション',
                'System' => 'システム',
                'Welding' => '溶接',
                'Spraying' => '塗装',
                'Handling' => '搬送',
                'Palletizing' => 'パレタイジング',
                'Cutting' => '切断',
                'Grinding' => '研磨',
                'Polishing' => '研磨',
                'Bending' => '曲げ',
                'Stamping' => 'プレス',
                'Dispensing' => '塗布',
                'Engraving' => '彫刻',
                'Inspection' => '検査',
                'Assembly' => '組立',
                'Loading and Unloading' => '搬入搬出',
                'Construction Machinery' => '建設機械',
                'Automotive and Parts' => '自動車・部品',
                'Metal Processing' => '金属加工',
                'Sheet Metal' => '板金',
                'Shipbuilding' => '造船',
                'Steel Structures' => '鉄骨構造',
                'Service Industry' => 'サービス業',
                'Smart Manufacturing' => 'スマート製造',
                'Smart Commerce' => 'スマート商業',
                'AGV' => 'AGV',
                'Coffee' => 'コーヒー',
                'Cleaning' => '清掃',
                'Vision' => 'ビジョン',
                'Composite' => '複合',
                'Machine Tool' => '工作機械',
                'Positioners and Linear Tracks' => 'ポジショナとリニアレール',
                'Excavator' => '掘削機',
                'Loader' => 'ローダー',
                'Bucket' => 'バケット',
                'Frame' => 'フレーム',
                'Vehicle' => '車両',
                'Automotive' => '自動車',
                'Steel Structure' => '鉄骨構造',
                'Humanoid' => 'ヒューマノイド',
            ],
        ],
        'es' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan ofrece integración de automatización para producción real, desde la planificación del proceso y la integración robótica hasta el control, la puesta en marcha y el soporte continuo.',
            'topics' => [
                'product' => 'Los robots industriales y colaborativos se adaptan al proceso real para formar sistemas de automatización estables.',
                'solution' => 'Con experiencia sectorial, ofrecemos soluciones aplicables para soldadura, pulido, pulverización, manipulación, ensamblaje y otros procesos.',
                'service' => 'Cubrimos análisis de requisitos, diseño, integración, entrega en sitio, capacitación y soporte remoto.',
                'case' => 'Este caso combina robots, utillajes, control y proceso de planta para mejorar eficiencia y estabilidad de calidad.',
                'contact' => 'Indique proceso, producto, ciclo, condiciones del sitio y objetivos de automatización; el equipo de ChenXuan lo revisará.',
                'download' => 'Recursos para proyectos de automatización, soluciones sectoriales, aplicaciones de proceso y mantenimiento.',
                'news' => 'ChenXuan comparte experiencia de proyectos e ideas sobre automatización y fabricación inteligente.',
                'smart' => 'Integramos robótica en escenarios comerciales para crear servicios automatizados estables y operables.',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'Robótica ChenXuan',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'Robot ChenXuan',
                'Log in' => 'Iniciar sesión',
                'Register' => 'Registrarse',
                'Search' => 'Buscar',
                'All' => 'Todo',
                'Learn More' => 'Más información',
                'Explore More' => 'Explorar más',
                'View All' => 'Ver todo',
                'Read More' => 'Leer más',
                'Read Now' => 'Leer ahora',
                'Load More' => 'Cargar más',
                'View Details' => 'Ver detalles',
                'Contact Us' => 'Contáctenos',
                'Submit Request' => 'Enviar solicitud',
                'Consult Online' => 'Consulta en línea',
                'Book a Discussion' => 'Reservar consulta',
                'Back to Top' => 'Volver arriba',
                'Name' => 'Nombre',
                'Enter your name' => 'Ingrese su nombre',
                'Phone' => 'Teléfono',
                'Enter your phone' => 'Ingrese su teléfono',
                'Enter phone number' => 'Ingrese el teléfono',
                'Email' => 'Correo electrónico',
                'Enter your email' => 'Ingrese su correo',
                'Enter email' => 'Ingrese el correo',
                'Company' => 'Empresa',
                'Enter company name' => 'Ingrese el nombre de la empresa',
                'Requirements' => 'Requisitos',
                'Please select' => 'Seleccione',
                'Other' => 'Otro',
                'I have read and agree to' => 'He leído y acepto',
                'Privacy Policy' => 'Política de privacidad',
                'User Agreement' => 'Acuerdo de usuario',
                'Cookie Policy' => 'Política de cookies',
                'Accept' => 'Aceptar',
                'Decline' => 'Rechazar',
                'No results found' => 'Sin resultados',
                'Found %s results for "%s"' => 'Se encontraron %s resultados para "%s"',
                'Page unavailable' => 'Página no disponible',
                'Back Home' => 'Volver al inicio',
                'Products' => 'Productos',
                'Solutions' => 'Soluciones',
                'News' => 'Noticias',
                'Download Center' => 'Centro de descargas',
                'Case Studies' => 'Casos',
                'Service & Support' => 'Servicio y soporte',
            ],
            'terms' => [
                'Industrial Robots' => 'Robots industriales',
                'Industrial Robot' => 'Robot industrial',
                'Collaborative Robots' => 'Robots colaborativos',
                'Collaborative Robot' => 'Robot colaborativo',
                'Robot Product Series' => 'Serie de productos robóticos',
                'Product Series' => 'Serie de productos',
                'Robot' => 'Robot',
                'Robots' => 'Robots',
                'Automation' => 'Automatización',
                'Integration' => 'Integración',
                'Solution' => 'Solución',
                'Solutions' => 'Soluciones',
                'Industry' => 'Industria',
                'Application' => 'Aplicación',
                'Applications' => 'Aplicaciones',
                'Process' => 'Proceso',
                'Processes' => 'Procesos',
                'Service' => 'Servicio',
                'Support' => 'Soporte',
                'Download' => 'Descarga',
                'Resources' => 'Recursos',
                'Training' => 'Capacitación',
                'Maintenance' => 'Mantenimiento',
                'Project' => 'Proyecto',
                'Workstation' => 'Estación de trabajo',
                'System' => 'Sistema',
                'Welding' => 'Soldadura',
                'Spraying' => 'Pulverización',
                'Handling' => 'Manipulación',
                'Palletizing' => 'Paletizado',
                'Cutting' => 'Corte',
                'Grinding' => 'Rectificado',
                'Polishing' => 'Pulido',
                'Bending' => 'Doblado',
                'Stamping' => 'Estampado',
                'Dispensing' => 'Dispensación',
                'Engraving' => 'Grabado',
                'Inspection' => 'Inspección',
                'Assembly' => 'Ensamblaje',
                'Loading and Unloading' => 'Carga y descarga',
                'Construction Machinery' => 'Maquinaria de construcción',
                'Automotive and Parts' => 'Automoción y piezas',
                'Metal Processing' => 'Procesamiento de metales',
                'Sheet Metal' => 'Chapa metálica',
                'Shipbuilding' => 'Construcción naval',
                'Steel Structures' => 'Estructuras de acero',
                'Service Industry' => 'Industria de servicios',
                'Smart Manufacturing' => 'Fabricación inteligente',
                'Smart Commerce' => 'Comercio inteligente',
                'Coffee' => 'Café',
                'Cleaning' => 'Limpieza',
                'Vision' => 'Visión',
                'Composite' => 'Compuesto',
                'Machine Tool' => 'Máquina herramienta',
                'Positioners and Linear Tracks' => 'Posicionadores y rieles lineales',
                'Excavator' => 'Excavadora',
                'Loader' => 'Cargadora',
                'Bucket' => 'Cazo',
                'Frame' => 'Bastidor',
                'Vehicle' => 'Vehículo',
                'Automotive' => 'Automotriz',
                'Steel Structure' => 'Estructura de acero',
                'Humanoid' => 'Humanoide',
            ],
        ],
        'de' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan liefert Automatisierungsintegration für reale Produktionsumgebungen, von Prozessplanung und Roboterintegration bis zu Steuerung, Inbetriebnahme und laufendem Support.',
            'topics' => [
                'product' => 'Industrie- und kollaborative Roboter werden passend zum realen Prozess als stabile Automatisierungssysteme eingesetzt.',
                'solution' => 'Auf Basis von Branchenerfahrung liefern wir umsetzbare Lösungen für Schweißen, Schleifen, Sprühen, Handling, Montage und weitere Prozesse.',
                'service' => 'Wir unterstützen Anforderungsanalyse, Lösungskonzept, Systemintegration, Vor-Ort-Lieferung, Schulung und Remote-Service.',
                'case' => 'Dieser Fall verbindet Roboter, Vorrichtungen, Steuerung und Prozess vor Ort, um Effizienz und Qualitätsstabilität zu verbessern.',
                'contact' => 'Beschreiben Sie Prozess, Produkt, Taktzeit, Standortbedingungen und Automatisierungsziele; das ChenXuan-Team prüft die Anfrage.',
                'download' => 'Materialien zu Automatisierungsprojekten, Branchenlösungen, Prozessanwendungen und Wartung.',
                'news' => 'ChenXuan teilt Projekterfahrung und Einblicke in Automatisierung und intelligente Fertigung.',
                'smart' => 'Robotik wird in kommerzielle Serviceszenarien integriert, um stabile automatisierte Betriebsabläufe zu schaffen.',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'ChenXuan Robotik',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'ChenXuan Roboter',
                'Log in' => 'Anmelden',
                'Register' => 'Registrieren',
                'Search' => 'Suchen',
                'All' => 'Alle',
                'Learn More' => 'Mehr erfahren',
                'Explore More' => 'Mehr entdecken',
                'View All' => 'Alle anzeigen',
                'Read More' => 'Weiterlesen',
                'Read Now' => 'Jetzt lesen',
                'Load More' => 'Mehr laden',
                'View Details' => 'Details anzeigen',
                'Contact Us' => 'Kontakt',
                'Submit Request' => 'Anfrage senden',
                'Consult Online' => 'Online-Beratung',
                'Book a Discussion' => 'Gespräch buchen',
                'Back to Top' => 'Nach oben',
                'Name' => 'Name',
                'Enter your name' => 'Namen eingeben',
                'Phone' => 'Telefon',
                'Enter your phone' => 'Telefonnummer eingeben',
                'Enter phone number' => 'Telefonnummer eingeben',
                'Email' => 'E-Mail',
                'Enter your email' => 'E-Mail eingeben',
                'Enter email' => 'E-Mail eingeben',
                'Company' => 'Unternehmen',
                'Enter company name' => 'Unternehmensname eingeben',
                'Requirements' => 'Anforderungen',
                'Please select' => 'Bitte auswählen',
                'Other' => 'Sonstiges',
                'I have read and agree to' => 'Ich habe gelesen und stimme zu',
                'Privacy Policy' => 'Datenschutzerklärung',
                'User Agreement' => 'Nutzungsvereinbarung',
                'Cookie Policy' => 'Cookie-Richtlinie',
                'Accept' => 'Akzeptieren',
                'Decline' => 'Ablehnen',
                'No results found' => 'Keine Ergebnisse',
                'Found %s results for "%s"' => '%s Ergebnisse für "%s" gefunden',
                'Page unavailable' => 'Seite nicht verfügbar',
                'Back Home' => 'Zur Startseite',
                'Products' => 'Produkte',
                'Solutions' => 'Lösungen',
                'News' => 'News',
                'Download Center' => 'Download-Center',
                'Case Studies' => 'Fallstudien',
                'Service & Support' => 'Service und Support',
            ],
            'terms' => [
                'Industrial Robots' => 'Industrieroboter',
                'Industrial Robot' => 'Industrieroboter',
                'Collaborative Robots' => 'Kollaborative Roboter',
                'Collaborative Robot' => 'Kollaborativer Roboter',
                'Robot Product Series' => 'Roboter-Produktserie',
                'Product Series' => 'Produktserie',
                'Robot' => 'Roboter',
                'Robots' => 'Roboter',
                'Automation' => 'Automatisierung',
                'Integration' => 'Integration',
                'Solution' => 'Lösung',
                'Solutions' => 'Lösungen',
                'Industry' => 'Branche',
                'Application' => 'Anwendung',
                'Applications' => 'Anwendungen',
                'Process' => 'Prozess',
                'Processes' => 'Prozesse',
                'Service' => 'Service',
                'Support' => 'Support',
                'Download' => 'Download',
                'Resources' => 'Ressourcen',
                'Training' => 'Schulung',
                'Maintenance' => 'Wartung',
                'Project' => 'Projekt',
                'Workstation' => 'Arbeitsstation',
                'System' => 'System',
                'Welding' => 'Schweißen',
                'Spraying' => 'Sprühen',
                'Handling' => 'Handling',
                'Palletizing' => 'Palettieren',
                'Cutting' => 'Schneiden',
                'Grinding' => 'Schleifen',
                'Polishing' => 'Polieren',
                'Bending' => 'Biegen',
                'Stamping' => 'Stanzen',
                'Dispensing' => 'Dosieren',
                'Engraving' => 'Gravieren',
                'Inspection' => 'Inspektion',
                'Assembly' => 'Montage',
                'Loading and Unloading' => 'Be- und Entladen',
                'Construction Machinery' => 'Baumaschinen',
                'Automotive and Parts' => 'Automobil und Teile',
                'Metal Processing' => 'Metallverarbeitung',
                'Sheet Metal' => 'Blech',
                'Shipbuilding' => 'Schiffbau',
                'Steel Structures' => 'Stahlkonstruktionen',
                'Service Industry' => 'Dienstleistungsbranche',
                'Smart Manufacturing' => 'Intelligente Fertigung',
                'Smart Commerce' => 'Smart Commerce',
                'Coffee' => 'Kaffee',
                'Cleaning' => 'Reinigung',
                'Vision' => 'Vision',
                'Composite' => 'Verbund',
                'Machine Tool' => 'Werkzeugmaschine',
                'Positioners and Linear Tracks' => 'Positionierer und Linearachsen',
                'Excavator' => 'Bagger',
                'Loader' => 'Lader',
                'Bucket' => 'Schaufel',
                'Frame' => 'Rahmen',
                'Vehicle' => 'Fahrzeug',
                'Automotive' => 'Automotive',
                'Steel Structure' => 'Stahlkonstruktion',
                'Humanoid' => 'Humanoid',
            ],
        ],
        'fr' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan fournit une intégration d’automatisation pour les sites de production réels, de la planification du procédé et de l’intégration robotique au contrôle, à la mise en service et au support continu.',
            'topics' => [
                'product' => 'Les robots industriels et collaboratifs sont adaptés aux procédés réels pour former des systèmes d’automatisation stables.',
                'solution' => 'À partir de l’expérience sectorielle, nous livrons des solutions applicables pour le soudage, le polissage, la pulvérisation, la manutention, l’assemblage et d’autres procédés.',
                'service' => 'Nous couvrons l’analyse des besoins, la conception, l’intégration, la livraison sur site, la formation et le support à distance.',
                'case' => 'Ce cas combine robots, outillages, contrôle et procédé sur site afin d’améliorer l’efficacité et la stabilité qualité.',
                'contact' => 'Décrivez procédé, produit, cadence, conditions du site et objectifs d’automatisation; l’équipe ChenXuan examinera votre demande.',
                'download' => 'Ressources pour projets d’automatisation, solutions sectorielles, applications de procédé et maintenance.',
                'news' => 'ChenXuan partage son expérience projet et ses analyses sur l’automatisation et la fabrication intelligente.',
                'smart' => 'La robotique est intégrée aux scénarios de service commercial pour créer des opérations automatisées stables.',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'Robotique ChenXuan',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'Robot ChenXuan',
                'Log in' => 'Connexion',
                'Register' => 'S’inscrire',
                'Search' => 'Rechercher',
                'All' => 'Tout',
                'Learn More' => 'En savoir plus',
                'Explore More' => 'Explorer plus',
                'View All' => 'Tout voir',
                'Read More' => 'Lire la suite',
                'Read Now' => 'Lire maintenant',
                'Load More' => 'Charger plus',
                'View Details' => 'Voir les détails',
                'Contact Us' => 'Nous contacter',
                'Submit Request' => 'Envoyer la demande',
                'Consult Online' => 'Consultation en ligne',
                'Book a Discussion' => 'Réserver un échange',
                'Back to Top' => 'Retour en haut',
                'Name' => 'Nom',
                'Enter your name' => 'Saisissez votre nom',
                'Phone' => 'Téléphone',
                'Enter your phone' => 'Saisissez votre téléphone',
                'Enter phone number' => 'Saisissez le téléphone',
                'Email' => 'E-mail',
                'Enter your email' => 'Saisissez votre e-mail',
                'Enter email' => 'Saisissez l’e-mail',
                'Company' => 'Entreprise',
                'Enter company name' => 'Saisissez le nom de l’entreprise',
                'Requirements' => 'Besoins',
                'Please select' => 'Veuillez sélectionner',
                'Other' => 'Autre',
                'I have read and agree to' => 'J’ai lu et j’accepte',
                'Privacy Policy' => 'Politique de confidentialité',
                'User Agreement' => 'Accord utilisateur',
                'Cookie Policy' => 'Politique relative aux cookies',
                'Accept' => 'Accepter',
                'Decline' => 'Refuser',
                'No results found' => 'Aucun résultat',
                'Found %s results for "%s"' => '%s résultats trouvés pour "%s"',
                'Page unavailable' => 'Page indisponible',
                'Back Home' => 'Retour à l’accueil',
                'Products' => 'Produits',
                'Solutions' => 'Solutions',
                'News' => 'Actualités',
                'Download Center' => 'Centre de téléchargement',
                'Case Studies' => 'Cas clients',
                'Service & Support' => 'Service et support',
            ],
            'terms' => [
                'Industrial Robots' => 'Robots industriels',
                'Industrial Robot' => 'Robot industriel',
                'Collaborative Robots' => 'Robots collaboratifs',
                'Collaborative Robot' => 'Robot collaboratif',
                'Robot Product Series' => 'Série de produits robotiques',
                'Product Series' => 'Série de produits',
                'Robot' => 'Robot',
                'Robots' => 'Robots',
                'Automation' => 'Automatisation',
                'Integration' => 'Intégration',
                'Solution' => 'Solution',
                'Solutions' => 'Solutions',
                'Industry' => 'Secteur',
                'Application' => 'Application',
                'Applications' => 'Applications',
                'Process' => 'Procédé',
                'Processes' => 'Procédés',
                'Service' => 'Service',
                'Support' => 'Support',
                'Download' => 'Téléchargement',
                'Resources' => 'Ressources',
                'Training' => 'Formation',
                'Maintenance' => 'Maintenance',
                'Project' => 'Projet',
                'Workstation' => 'Poste robotisé',
                'System' => 'Système',
                'Welding' => 'Soudage',
                'Spraying' => 'Pulvérisation',
                'Handling' => 'Manutention',
                'Palletizing' => 'Palettisation',
                'Cutting' => 'Découpe',
                'Grinding' => 'Meulage',
                'Polishing' => 'Polissage',
                'Bending' => 'Pliage',
                'Stamping' => 'Emboutissage',
                'Dispensing' => 'Dosage',
                'Engraving' => 'Gravure',
                'Inspection' => 'Inspection',
                'Assembly' => 'Assemblage',
                'Loading and Unloading' => 'Chargement et déchargement',
                'Construction Machinery' => 'Machines de construction',
                'Automotive and Parts' => 'Automobile et pièces',
                'Metal Processing' => 'Traitement des métaux',
                'Sheet Metal' => 'Tôlerie',
                'Shipbuilding' => 'Construction navale',
                'Steel Structures' => 'Structures acier',
                'Service Industry' => 'Secteur des services',
                'Smart Manufacturing' => 'Fabrication intelligente',
                'Smart Commerce' => 'Commerce intelligent',
                'Coffee' => 'Café',
                'Cleaning' => 'Nettoyage',
                'Vision' => 'Vision',
                'Composite' => 'Composite',
                'Machine Tool' => 'Machine-outil',
                'Positioners and Linear Tracks' => 'Positionneurs et axes linéaires',
                'Excavator' => 'Excavatrice',
                'Loader' => 'Chargeuse',
                'Bucket' => 'Godet',
                'Frame' => 'Châssis',
                'Vehicle' => 'Véhicule',
                'Automotive' => 'Automobile',
                'Steel Structure' => 'Structure acier',
                'Humanoid' => 'Humanoïde',
            ],
        ],
        'th' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan ให้บริการบูรณาการระบบอัตโนมัติสำหรับการผลิตจริง ตั้งแต่การวางแผนกระบวนการ การรวมระบบหุ่นยนต์ ระบบควบคุม การส่งมอบหน้างาน ไปจนถึงการสนับสนุนต่อเนื่อง',
            'topics' => [
                'product' => 'หุ่นยนต์อุตสาหกรรมและหุ่นยนต์ร่วมปฏิบัติงานถูกปรับให้เข้ากับกระบวนการจริง เพื่อสร้างระบบอัตโนมัติที่เสถียร',
                'solution' => 'จากประสบการณ์ในอุตสาหกรรม เราส่งมอบโซลูชันที่นำไปใช้ได้จริงสำหรับงานเชื่อม ขัด พ่นสี ลำเลียง ประกอบ และกระบวนการอื่นๆ',
                'service' => 'ครอบคลุมการวิเคราะห์ความต้องการ ออกแบบโซลูชัน รวมระบบ ส่งมอบหน้างาน ฝึกอบรม และสนับสนุนระยะไกล',
                'case' => 'กรณีนี้ผสานหุ่นยนต์ ฟิกซ์เจอร์ ระบบควบคุม และกระบวนการหน้างาน เพื่อเพิ่มประสิทธิภาพและความสม่ำเสมอของคุณภาพ',
                'contact' => 'โปรดระบุกระบวนการ ผลิตภัณฑ์ รอบเวลา เงื่อนไขหน้างาน และเป้าหมายระบบอัตโนมัติ ทีม ChenXuan จะติดต่อกลับ',
                'download' => 'เอกสารสำหรับโครงการอัตโนมัติ โซลูชันอุตสาหกรรม การใช้งานกระบวนการ และการบำรุงรักษา',
                'news' => 'ChenXuan แบ่งปันประสบการณ์โครงการและข้อมูลเชิงลึกด้านระบบอัตโนมัติและการผลิตอัจฉริยะ',
                'smart' => 'นำเทคโนโลยีหุ่นยนต์เข้าสู่สถานการณ์บริการเชิงพาณิชย์ เพื่อสร้างการดำเนินงานอัตโนมัติที่เสถียร',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'ChenXuan Robotics',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'หุ่นยนต์ ChenXuan',
                'Log in' => 'เข้าสู่ระบบ',
                'Register' => 'สมัครสมาชิก',
                'Search' => 'ค้นหา',
                'All' => 'ทั้งหมด',
                'Learn More' => 'เรียนรู้เพิ่มเติม',
                'Explore More' => 'สำรวจเพิ่มเติม',
                'View All' => 'ดูทั้งหมด',
                'Read More' => 'อ่านเพิ่มเติม',
                'Read Now' => 'อ่านตอนนี้',
                'Load More' => 'โหลดเพิ่ม',
                'View Details' => 'ดูรายละเอียด',
                'Contact Us' => 'ติดต่อเรา',
                'Submit Request' => 'ส่งคำขอ',
                'Consult Online' => 'ปรึกษาออนไลน์',
                'Book a Discussion' => 'นัดหมายพูดคุย',
                'Back to Top' => 'กลับด้านบน',
                'Name' => 'ชื่อ',
                'Enter your name' => 'กรอกชื่อของคุณ',
                'Phone' => 'โทรศัพท์',
                'Enter your phone' => 'กรอกเบอร์โทรศัพท์',
                'Enter phone number' => 'กรอกเบอร์โทรศัพท์',
                'Email' => 'อีเมล',
                'Enter your email' => 'กรอกอีเมล',
                'Enter email' => 'กรอกอีเมล',
                'Company' => 'บริษัท',
                'Enter company name' => 'กรอกชื่อบริษัท',
                'Requirements' => 'ความต้องการ',
                'Please select' => 'โปรดเลือก',
                'Other' => 'อื่นๆ',
                'I have read and agree to' => 'ฉันได้อ่านและยอมรับ',
                'Privacy Policy' => 'นโยบายความเป็นส่วนตัว',
                'User Agreement' => 'ข้อตกลงผู้ใช้',
                'Cookie Policy' => 'นโยบายคุกกี้',
                'Accept' => 'ยอมรับ',
                'Decline' => 'ปฏิเสธ',
                'No results found' => 'ไม่พบผลลัพธ์',
                'Found %s results for "%s"' => 'พบ %s ผลลัพธ์สำหรับ "%s"',
                'Page unavailable' => 'ไม่สามารถแสดงหน้าได้',
                'Back Home' => 'กลับหน้าแรก',
                'Products' => 'ผลิตภัณฑ์',
                'Solutions' => 'โซลูชัน',
                'News' => 'ข่าว',
                'Download Center' => 'ศูนย์ดาวน์โหลด',
                'Case Studies' => 'กรณีศึกษา',
                'Service & Support' => 'บริการและสนับสนุน',
            ],
            'terms' => [
                'Industrial Robots' => 'หุ่นยนต์อุตสาหกรรม',
                'Industrial Robot' => 'หุ่นยนต์อุตสาหกรรม',
                'Collaborative Robots' => 'หุ่นยนต์ร่วมปฏิบัติงาน',
                'Collaborative Robot' => 'หุ่นยนต์ร่วมปฏิบัติงาน',
                'Robot Product Series' => 'ซีรีส์ผลิตภัณฑ์หุ่นยนต์',
                'Product Series' => 'ซีรีส์ผลิตภัณฑ์',
                'Robot' => 'หุ่นยนต์',
                'Robots' => 'หุ่นยนต์',
                'Automation' => 'ระบบอัตโนมัติ',
                'Integration' => 'การบูรณาการ',
                'Solution' => 'โซลูชัน',
                'Solutions' => 'โซลูชัน',
                'Industry' => 'อุตสาหกรรม',
                'Application' => 'การใช้งาน',
                'Applications' => 'การใช้งาน',
                'Process' => 'กระบวนการ',
                'Processes' => 'กระบวนการ',
                'Service' => 'บริการ',
                'Support' => 'สนับสนุน',
                'Download' => 'ดาวน์โหลด',
                'Resources' => 'เอกสาร',
                'Training' => 'การฝึกอบรม',
                'Maintenance' => 'บำรุงรักษา',
                'Project' => 'โครงการ',
                'Workstation' => 'สถานีงาน',
                'System' => 'ระบบ',
                'Welding' => 'เชื่อม',
                'Spraying' => 'พ่นสี',
                'Handling' => 'ลำเลียง',
                'Palletizing' => 'จัดเรียงพาเลท',
                'Cutting' => 'ตัด',
                'Grinding' => 'ขัด',
                'Polishing' => 'ขัดเงา',
                'Bending' => 'ดัด',
                'Stamping' => 'ปั๊ม',
                'Dispensing' => 'จ่ายกาว',
                'Engraving' => 'แกะสลัก',
                'Inspection' => 'ตรวจสอบ',
                'Assembly' => 'ประกอบ',
                'Loading and Unloading' => 'โหลดและขนถ่าย',
                'Construction Machinery' => 'เครื่องจักรก่อสร้าง',
                'Automotive and Parts' => 'ยานยนต์และชิ้นส่วน',
                'Metal Processing' => 'แปรรูปโลหะ',
                'Sheet Metal' => 'โลหะแผ่น',
                'Shipbuilding' => 'ต่อเรือ',
                'Steel Structures' => 'โครงสร้างเหล็ก',
                'Service Industry' => 'อุตสาหกรรมบริการ',
                'Smart Manufacturing' => 'การผลิตอัจฉริยะ',
                'Smart Commerce' => 'พาณิชย์อัจฉริยะ',
                'Coffee' => 'กาแฟ',
                'Cleaning' => 'ทำความสะอาด',
                'Vision' => 'วิชัน',
                'Composite' => 'คอมโพสิต',
                'Machine Tool' => 'เครื่องจักรกล',
                'Positioners and Linear Tracks' => 'โพสิชันเนอร์และรางเชิงเส้น',
                'Excavator' => 'รถขุด',
                'Loader' => 'รถตัก',
                'Bucket' => 'บุ้งกี๋',
                'Frame' => 'โครง',
                'Vehicle' => 'ยานพาหนะ',
                'Automotive' => 'ยานยนต์',
                'Steel Structure' => 'โครงสร้างเหล็ก',
                'Humanoid' => 'ฮิวแมนนอยด์',
            ],
        ],
        'ko' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan은 실제 생산 현장에 맞춰 공정 기획, 로봇 통합, 제어 시스템, 현장 납품, 지속 지원까지 자동화 통합을 제공합니다.',
            'topics' => [
                'product' => '산업용 로봇과 협동 로봇을 실제 공정에 맞춰 안정적인 자동화 시스템으로 구축합니다.',
                'solution' => '산업 경험을 바탕으로 용접, 연마, 도장, 이송, 조립 등 공정에 적용 가능한 자동화 솔루션을 제공합니다.',
                'service' => '요구 분석, 솔루션 설계, 시스템 통합, 현장 납품, 교육, 원격 지원까지 전 과정을 지원합니다.',
                'case' => '이 사례는 로봇, 지그, 제어, 현장 공정을 결합해 생산 효율과 품질 안정성을 높입니다.',
                'contact' => '공정, 제품, 택트타임, 현장 조건, 자동화 목표를 남겨 주시면 ChenXuan 엔지니어가 확인합니다.',
                'download' => '자동화 프로젝트, 산업 솔루션, 공정 적용, 유지보수 자료를 제공합니다.',
                'news' => 'ChenXuan은 자동화와 스마트 제조에 관한 프로젝트 경험과 산업 인사이트를 공유합니다.',
                'smart' => '상업 서비스 현장에 로봇 기술을 통합해 안정적으로 운영 가능한 자동화 경험을 제공합니다.',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'ChenXuan 로보틱스',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'ChenXuan 로봇',
                'Log in' => '로그인',
                'Register' => '회원가입',
                'Search' => '검색',
                'All' => '전체',
                'Learn More' => '자세히 보기',
                'Explore More' => '더 살펴보기',
                'View All' => '전체 보기',
                'Read More' => '더 읽기',
                'Read Now' => '지금 보기',
                'Load More' => '더 보기',
                'View Details' => '상세 보기',
                'Contact Us' => '문의하기',
                'Submit Request' => '요청 제출',
                'Consult Online' => '온라인 상담',
                'Book a Discussion' => '상담 예약',
                'Back to Top' => '맨 위로',
                'Name' => '이름',
                'Enter your name' => '이름을 입력하세요',
                'Phone' => '전화',
                'Enter your phone' => '전화번호를 입력하세요',
                'Enter phone number' => '전화번호를 입력하세요',
                'Email' => '이메일',
                'Enter your email' => '이메일을 입력하세요',
                'Enter email' => '이메일을 입력하세요',
                'Company' => '회사',
                'Enter company name' => '회사명을 입력하세요',
                'Requirements' => '요구사항',
                'Please select' => '선택하세요',
                'Other' => '기타',
                'I have read and agree to' => '읽고 동의합니다',
                'Privacy Policy' => '개인정보 처리방침',
                'User Agreement' => '이용 약관',
                'Cookie Policy' => '쿠키 정책',
                'Accept' => '동의',
                'Decline' => '거부',
                'No results found' => '검색 결과가 없습니다',
                'Found %s results for "%s"' => '"%2$s"에 대한 결과 %1$s개를 찾았습니다',
                'Page unavailable' => '페이지를 사용할 수 없습니다',
                'Back Home' => '홈으로',
                'Products' => '제품',
                'Solutions' => '솔루션',
                'News' => '뉴스',
                'Download Center' => '다운로드 센터',
                'Case Studies' => '사례',
                'Service & Support' => '서비스 및 지원',
            ],
            'terms' => [
                'Industrial Robots' => '산업용 로봇',
                'Industrial Robot' => '산업용 로봇',
                'Collaborative Robots' => '협동 로봇',
                'Collaborative Robot' => '협동 로봇',
                'Robot Product Series' => '로봇 제품 시리즈',
                'Product Series' => '제품 시리즈',
                'Robot' => '로봇',
                'Robots' => '로봇',
                'Automation' => '자동화',
                'Integration' => '통합',
                'Solution' => '솔루션',
                'Solutions' => '솔루션',
                'Industry' => '산업',
                'Application' => '적용',
                'Applications' => '적용',
                'Process' => '공정',
                'Processes' => '공정',
                'Service' => '서비스',
                'Support' => '지원',
                'Download' => '다운로드',
                'Resources' => '자료',
                'Training' => '교육',
                'Maintenance' => '유지보수',
                'Project' => '프로젝트',
                'Workstation' => '워크스테이션',
                'System' => '시스템',
                'Welding' => '용접',
                'Spraying' => '도장',
                'Handling' => '이송',
                'Palletizing' => '팔레타이징',
                'Cutting' => '절단',
                'Grinding' => '연마',
                'Polishing' => '폴리싱',
                'Bending' => '절곡',
                'Stamping' => '프레스',
                'Dispensing' => '도포',
                'Engraving' => '조각',
                'Inspection' => '검사',
                'Assembly' => '조립',
                'Loading and Unloading' => '상하차',
                'Construction Machinery' => '건설기계',
                'Automotive and Parts' => '자동차 및 부품',
                'Metal Processing' => '금속 가공',
                'Sheet Metal' => '판금',
                'Shipbuilding' => '조선',
                'Steel Structures' => '철골 구조',
                'Service Industry' => '서비스 산업',
                'Smart Manufacturing' => '스마트 제조',
                'Smart Commerce' => '스마트 커머스',
                'Coffee' => '커피',
                'Cleaning' => '청소',
                'Vision' => '비전',
                'Composite' => '복합',
                'Machine Tool' => '공작기계',
                'Positioners and Linear Tracks' => '포지셔너 및 리니어 트랙',
                'Excavator' => '굴착기',
                'Loader' => '로더',
                'Bucket' => '버킷',
                'Frame' => '프레임',
                'Vehicle' => '차량',
                'Automotive' => '자동차',
                'Steel Structure' => '철골 구조',
                'Humanoid' => '휴머노이드',
            ],
        ],
        'it' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan fornisce integrazione di automazione per ambienti produttivi reali, dalla pianificazione del processo e integrazione robotica al controllo, alla consegna in sito e al supporto continuo.',
            'topics' => [
                'product' => 'Robot industriali e collaborativi vengono adattati al processo reale per creare sistemi di automazione stabili.',
                'solution' => 'Sulla base dell’esperienza di settore offriamo soluzioni applicabili per saldatura, levigatura, spruzzatura, movimentazione, assemblaggio e altri processi.',
                'service' => 'Copriamo analisi requisiti, progettazione, integrazione, consegna in sito, formazione e supporto remoto.',
                'case' => 'Questo caso integra robot, attrezzature, controllo e processo di fabbrica per migliorare efficienza e stabilità della qualità.',
                'contact' => 'Indicate processo, prodotto, tempo ciclo, condizioni del sito e obiettivi di automazione; il team ChenXuan valuterà la richiesta.',
                'download' => 'Materiali per progetti di automazione, soluzioni di settore, applicazioni di processo e manutenzione.',
                'news' => 'ChenXuan condivide esperienza di progetto e approfondimenti su automazione e manifattura intelligente.',
                'smart' => 'La robotica entra negli scenari commerciali per creare esperienze di servizio automatizzate e stabili.',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'Robotica ChenXuan',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'Robot ChenXuan',
                'Log in' => 'Accedi',
                'Register' => 'Registrati',
                'Search' => 'Cerca',
                'All' => 'Tutto',
                'Learn More' => 'Scopri di più',
                'Explore More' => 'Esplora altro',
                'View All' => 'Vedi tutto',
                'Read More' => 'Leggi di più',
                'Read Now' => 'Leggi ora',
                'Load More' => 'Carica altro',
                'View Details' => 'Vedi dettagli',
                'Contact Us' => 'Contattaci',
                'Submit Request' => 'Invia richiesta',
                'Consult Online' => 'Consulenza online',
                'Book a Discussion' => 'Prenota un confronto',
                'Back to Top' => 'Torna su',
                'Name' => 'Nome',
                'Enter your name' => 'Inserisci il nome',
                'Phone' => 'Telefono',
                'Enter your phone' => 'Inserisci il telefono',
                'Enter phone number' => 'Inserisci il telefono',
                'Email' => 'Email',
                'Enter your email' => 'Inserisci l’email',
                'Enter email' => 'Inserisci l’email',
                'Company' => 'Azienda',
                'Enter company name' => 'Inserisci il nome azienda',
                'Requirements' => 'Requisiti',
                'Please select' => 'Seleziona',
                'Other' => 'Altro',
                'I have read and agree to' => 'Ho letto e accetto',
                'Privacy Policy' => 'Informativa privacy',
                'User Agreement' => 'Accordo utente',
                'Cookie Policy' => 'Cookie policy',
                'Accept' => 'Accetta',
                'Decline' => 'Rifiuta',
                'No results found' => 'Nessun risultato',
                'Found %s results for "%s"' => 'Trovati %s risultati per "%s"',
                'Page unavailable' => 'Pagina non disponibile',
                'Back Home' => 'Torna alla home',
                'Products' => 'Prodotti',
                'Solutions' => 'Soluzioni',
                'News' => 'Notizie',
                'Download Center' => 'Centro download',
                'Case Studies' => 'Casi',
                'Service & Support' => 'Servizio e supporto',
            ],
            'terms' => [
                'Industrial Robots' => 'Robot industriali',
                'Industrial Robot' => 'Robot industriale',
                'Collaborative Robots' => 'Robot collaborativi',
                'Collaborative Robot' => 'Robot collaborativo',
                'Robot Product Series' => 'Serie prodotti robotici',
                'Product Series' => 'Serie prodotti',
                'Robot' => 'Robot',
                'Robots' => 'Robot',
                'Automation' => 'Automazione',
                'Integration' => 'Integrazione',
                'Solution' => 'Soluzione',
                'Solutions' => 'Soluzioni',
                'Industry' => 'Industria',
                'Application' => 'Applicazione',
                'Applications' => 'Applicazioni',
                'Process' => 'Processo',
                'Processes' => 'Processi',
                'Service' => 'Servizio',
                'Support' => 'Supporto',
                'Download' => 'Download',
                'Resources' => 'Risorse',
                'Training' => 'Formazione',
                'Maintenance' => 'Manutenzione',
                'Project' => 'Progetto',
                'Workstation' => 'Stazione di lavoro',
                'System' => 'Sistema',
                'Welding' => 'Saldatura',
                'Spraying' => 'Spruzzatura',
                'Handling' => 'Movimentazione',
                'Palletizing' => 'Pallettizzazione',
                'Cutting' => 'Taglio',
                'Grinding' => 'Levigatura',
                'Polishing' => 'Lucidatura',
                'Bending' => 'Piegatura',
                'Stamping' => 'Stampaggio',
                'Dispensing' => 'Dosaggio',
                'Engraving' => 'Incisione',
                'Inspection' => 'Ispezione',
                'Assembly' => 'Assemblaggio',
                'Loading and Unloading' => 'Carico e scarico',
                'Construction Machinery' => 'Macchine edili',
                'Automotive and Parts' => 'Automotive e componenti',
                'Metal Processing' => 'Lavorazione metalli',
                'Sheet Metal' => 'Lamiera',
                'Shipbuilding' => 'Cantieristica',
                'Steel Structures' => 'Strutture in acciaio',
                'Service Industry' => 'Settore servizi',
                'Smart Manufacturing' => 'Produzione intelligente',
                'Smart Commerce' => 'Commercio intelligente',
                'Coffee' => 'Caffè',
                'Cleaning' => 'Pulizia',
                'Vision' => 'Visione',
                'Composite' => 'Composito',
                'Machine Tool' => 'Macchina utensile',
                'Positioners and Linear Tracks' => 'Posizionatori e guide lineari',
                'Excavator' => 'Escavatore',
                'Loader' => 'Pala caricatrice',
                'Bucket' => 'Benna',
                'Frame' => 'Telaio',
                'Vehicle' => 'Veicolo',
                'Automotive' => 'Automotive',
                'Steel Structure' => 'Struttura in acciaio',
                'Humanoid' => 'Umanoide',
            ],
        ],
        'vi' => [
            'short' => 'ChenXuan',
            'generic' => 'ChenXuan cung cấp tích hợp tự động hóa cho môi trường sản xuất thực tế, từ lập kế hoạch quy trình, tích hợp robot, hệ thống điều khiển đến bàn giao hiện trường và hỗ trợ liên tục.',
            'topics' => [
                'product' => 'Robot công nghiệp và robot cộng tác được cấu hình theo quy trình thực tế để tạo thành hệ thống tự động hóa ổn định.',
                'solution' => 'Dựa trên kinh nghiệm ngành, chúng tôi cung cấp giải pháp khả thi cho hàn, mài, phun, vận chuyển, lắp ráp và các quy trình khác.',
                'service' => 'Bao gồm phân tích yêu cầu, thiết kế giải pháp, tích hợp hệ thống, bàn giao tại chỗ, đào tạo và hỗ trợ từ xa.',
                'case' => 'Trường hợp này kết hợp robot, đồ gá, điều khiển và quy trình hiện trường để nâng cao hiệu suất và độ ổn định chất lượng.',
                'contact' => 'Vui lòng mô tả quy trình, sản phẩm, nhịp sản xuất, điều kiện hiện trường và mục tiêu tự động hóa; đội ngũ ChenXuan sẽ phản hồi.',
                'download' => 'Tài liệu cho dự án tự động hóa, giải pháp ngành, ứng dụng quy trình và bảo trì.',
                'news' => 'ChenXuan chia sẻ kinh nghiệm dự án và góc nhìn về tự động hóa cùng sản xuất thông minh.',
                'smart' => 'Tích hợp công nghệ robot vào dịch vụ thương mại để tạo trải nghiệm vận hành tự động ổn định.',
            ],
            'exact' => [
                'ChenXuan Robotics' => 'Robot ChenXuan',
                'ChenXuan' => 'ChenXuan',
                'Chenxuan Robot' => 'Robot ChenXuan',
                'Log in' => 'Đăng nhập',
                'Register' => 'Đăng ký',
                'Search' => 'Tìm kiếm',
                'All' => 'Tất cả',
                'Learn More' => 'Tìm hiểu thêm',
                'Explore More' => 'Khám phá thêm',
                'View All' => 'Xem tất cả',
                'Read More' => 'Đọc thêm',
                'Read Now' => 'Đọc ngay',
                'Load More' => 'Tải thêm',
                'View Details' => 'Xem chi tiết',
                'Contact Us' => 'Liên hệ',
                'Submit Request' => 'Gửi yêu cầu',
                'Consult Online' => 'Tư vấn trực tuyến',
                'Book a Discussion' => 'Đặt lịch trao đổi',
                'Back to Top' => 'Lên đầu trang',
                'Name' => 'Họ tên',
                'Enter your name' => 'Nhập họ tên',
                'Phone' => 'Điện thoại',
                'Enter your phone' => 'Nhập số điện thoại',
                'Enter phone number' => 'Nhập số điện thoại',
                'Email' => 'Email',
                'Enter your email' => 'Nhập email',
                'Enter email' => 'Nhập email',
                'Company' => 'Công ty',
                'Enter company name' => 'Nhập tên công ty',
                'Requirements' => 'Nhu cầu',
                'Please select' => 'Vui lòng chọn',
                'Other' => 'Khác',
                'I have read and agree to' => 'Tôi đã đọc và đồng ý với',
                'Privacy Policy' => 'Chính sách bảo mật',
                'User Agreement' => 'Thỏa thuận người dùng',
                'Cookie Policy' => 'Chính sách cookie',
                'Accept' => 'Chấp nhận',
                'Decline' => 'Từ chối',
                'No results found' => 'Không có kết quả',
                'Found %s results for "%s"' => 'Tìm thấy %s kết quả cho "%s"',
                'Page unavailable' => 'Trang không khả dụng',
                'Back Home' => 'Về trang chủ',
                'Products' => 'Sản phẩm',
                'Solutions' => 'Giải pháp',
                'News' => 'Tin tức',
                'Download Center' => 'Trung tâm tải xuống',
                'Case Studies' => 'Trường hợp',
                'Service & Support' => 'Dịch vụ và hỗ trợ',
            ],
            'terms' => [
                'Industrial Robots' => 'Robot công nghiệp',
                'Industrial Robot' => 'Robot công nghiệp',
                'Collaborative Robots' => 'Robot cộng tác',
                'Collaborative Robot' => 'Robot cộng tác',
                'Robot Product Series' => 'Dòng sản phẩm robot',
                'Product Series' => 'Dòng sản phẩm',
                'Robot' => 'Robot',
                'Robots' => 'Robot',
                'Automation' => 'Tự động hóa',
                'Integration' => 'Tích hợp',
                'Solution' => 'Giải pháp',
                'Solutions' => 'Giải pháp',
                'Industry' => 'Ngành',
                'Application' => 'Ứng dụng',
                'Applications' => 'Ứng dụng',
                'Process' => 'Quy trình',
                'Processes' => 'Quy trình',
                'Service' => 'Dịch vụ',
                'Support' => 'Hỗ trợ',
                'Download' => 'Tải xuống',
                'Resources' => 'Tài liệu',
                'Training' => 'Đào tạo',
                'Maintenance' => 'Bảo trì',
                'Project' => 'Dự án',
                'Workstation' => 'Trạm làm việc',
                'System' => 'Hệ thống',
                'Welding' => 'Hàn',
                'Spraying' => 'Phun',
                'Handling' => 'Vận chuyển',
                'Palletizing' => 'Xếp pallet',
                'Cutting' => 'Cắt',
                'Grinding' => 'Mài',
                'Polishing' => 'Đánh bóng',
                'Bending' => 'Uốn',
                'Stamping' => 'Dập',
                'Dispensing' => 'Tra keo',
                'Engraving' => 'Khắc',
                'Inspection' => 'Kiểm tra',
                'Assembly' => 'Lắp ráp',
                'Loading and Unloading' => 'Cấp và dỡ tải',
                'Construction Machinery' => 'Máy xây dựng',
                'Automotive and Parts' => 'Ô tô và linh kiện',
                'Metal Processing' => 'Gia công kim loại',
                'Sheet Metal' => 'Kim loại tấm',
                'Shipbuilding' => 'Đóng tàu',
                'Steel Structures' => 'Kết cấu thép',
                'Service Industry' => 'Ngành dịch vụ',
                'Smart Manufacturing' => 'Sản xuất thông minh',
                'Smart Commerce' => 'Thương mại thông minh',
                'Coffee' => 'Cà phê',
                'Cleaning' => 'Vệ sinh',
                'Vision' => 'Thị giác',
                'Composite' => 'Phức hợp',
                'Machine Tool' => 'Máy công cụ',
                'Positioners and Linear Tracks' => 'Bộ định vị và ray tuyến tính',
                'Excavator' => 'Máy xúc',
                'Loader' => 'Máy xúc lật',
                'Bucket' => 'Gầu',
                'Frame' => 'Khung',
                'Vehicle' => 'Xe',
                'Automotive' => 'Ô tô',
                'Steel Structure' => 'Kết cấu thép',
                'Humanoid' => 'Hình người',
            ],
        ],
    ];
}

function chenxuan_locale_profile($lang) {
    $profiles = chenxuan_locale_profiles();
    return $profiles[$lang] ?? null;
}

function chenxuan_locale_extra_terms($lang) {
    $sets = [
        'ja' => [
            'One-stop Automation Integration Solutions' => 'ワンストップ自動化統合ソリューション',
            'Industrial Robot and Automation Integration Solutions' => '産業用ロボットと自動化統合ソリューション',
            'Intelligent Integration Solutions' => 'スマート統合ソリューション',
            'Smart Manufacturing Integration Solutions' => 'スマート製造統合ソリューション',
            'Automation Integration Solutions' => '自動化統合ソリューション',
            'Industrial Robot Product Series' => '産業用ロボット製品シリーズ',
            'Collaborative Robot Product Series' => '協働ロボット製品シリーズ',
            'AGV Intelligent Handling Systems' => 'AGVスマート搬送システム',
            'Automation · Robotics · Process Development · Machine and Control' => '自動化 · ロボット技術 · 工程開発 · 機械と制御',
            'Typical Applications' => '代表的な用途',
            'Industry Scenarios' => '業界シナリオ',
            'Industry Application Scenarios' => '業界別適用シナリオ',
            'Automation Workstations' => '自動化ワークステーション',
            'Automation Integration Service System' => '自動化統合サービス体系',
            'Intelligent Project Delivery System' => 'スマートプロジェクト納品体系',
            'Remote O&M and Technical Support' => 'リモート保守と技術サポート',
            'One-stop Turnkey Engineering' => 'ワンストップターンキー工程',
            'Smart scenario solutions based on industry experience' => '業界経験に基づくスマートシナリオソリューション',
            'Industrial and collaborative robot systems matched to real production processes.' => '実際の生産工程に合わせた産業用・協働ロボットシステム。',
            'Explore Solutions' => 'ソリューションを見る',
            'Consult Project' => 'プロジェクト相談',
            'Explore Products' => '製品を見る',
            'Submit Automation Requirement' => '自動化要件を送信',
            'Project Consultation' => 'プロジェクト相談',
            'Technical Discussion' => '技術相談',
            'Service Scope' => 'サービス範囲',
            'Industrial' => '産業用',
            'Collaborative' => '協働',
            'Typical' => '代表的な',
            'Scenarios' => 'シナリオ',
            'Scenario' => 'シナリオ',
            'Intelligent' => 'スマート',
            'Smart' => 'スマート',
            'Delivery' => '納品',
            'Technical' => '技術',
            'Remote O&M' => 'リモート保守',
            'Heavy Equipment' => '重機',
            'Systems' => 'システム',
            'Workstations' => 'ワークステーション',
            'Robotics' => 'ロボット技術',
            'Process Development' => '工程開発',
            'Machine and Control' => '機械と制御',
            'Machine' => '機械',
            'Control' => '制御',
            'Explore' => '見る',
            'Consult' => '相談',
            'Online' => 'オンライン',
            'Center' => 'センター',
            'Global' => 'グローバル',
            'and' => '・',
            'with' => 'と',
            'for' => '向け',
        ],
        'es' => [
            'One-stop Automation Integration Solutions' => 'Soluciones integrales de automatización',
            'Industrial Robot and Automation Integration Solutions' => 'Soluciones de robots industriales e integración de automatización',
            'Intelligent Integration Solutions' => 'Soluciones de integración inteligente',
            'Smart Manufacturing Integration Solutions' => 'Soluciones de integración de fabricación inteligente',
            'Automation Integration Solutions' => 'Soluciones de integración de automatización',
            'Industrial Robot Product Series' => 'Serie de robots industriales',
            'Collaborative Robot Product Series' => 'Serie de robots colaborativos',
            'AGV Intelligent Handling Systems' => 'Sistemas AGV inteligentes de manipulación',
            'Automation · Robotics · Process Development · Machine and Control' => 'Automatización · Robótica · Desarrollo de procesos · Máquina y control',
            'Typical Applications' => 'Aplicaciones típicas',
            'Industry Scenarios' => 'Escenarios industriales',
            'Industry Application Scenarios' => 'Escenarios de aplicación industrial',
            'Automation Workstations' => 'Estaciones de automatización',
            'Automation Integration Service System' => 'Sistema de servicio de integración de automatización',
            'Intelligent Project Delivery System' => 'Sistema inteligente de entrega de proyectos',
            'Remote O&M and Technical Support' => 'Operación remota y soporte técnico',
            'One-stop Turnkey Engineering' => 'Ingeniería llave en mano integral',
            'Smart scenario solutions based on industry experience' => 'Soluciones inteligentes basadas en experiencia industrial',
            'Industrial and collaborative robot systems matched to real production processes.' => 'Sistemas de robots industriales y colaborativos adaptados a procesos reales.',
            'Explore Solutions' => 'Explorar soluciones',
            'Consult Project' => 'Consultar proyecto',
            'Explore Products' => 'Explorar productos',
            'Submit Automation Requirement' => 'Enviar requisito de automatización',
            'Project Consultation' => 'Consulta de proyecto',
            'Technical Discussion' => 'Discusión técnica',
            'Service Scope' => 'Alcance del servicio',
            'Industrial' => 'Industrial',
            'Collaborative' => 'Colaborativo',
            'Typical' => 'Típico',
            'Scenarios' => 'Escenarios',
            'Scenario' => 'Escenario',
            'Intelligent' => 'Inteligente',
            'Smart' => 'Inteligente',
            'Delivery' => 'Entrega',
            'Technical' => 'Técnico',
            'Remote O&M' => 'O&M remoto',
            'Heavy Equipment' => 'Equipo pesado',
            'Systems' => 'Sistemas',
            'Workstations' => 'Estaciones de trabajo',
            'Robotics' => 'Robótica',
            'Process Development' => 'Desarrollo de procesos',
            'Machine and Control' => 'Máquina y control',
            'Machine' => 'Máquina',
            'Control' => 'Control',
            'Explore' => 'Explorar',
            'Consult' => 'Consultar',
            'Online' => 'En línea',
            'Center' => 'Centro',
            'and' => 'y',
            'with' => 'con',
            'for' => 'para',
        ],
        'de' => [
            'One-stop Automation Integration Solutions' => 'Komplettlösungen für Automatisierungsintegration',
            'Industrial Robot and Automation Integration Solutions' => 'Lösungen für Industrieroboter und Automatisierungsintegration',
            'Intelligent Integration Solutions' => 'Intelligente Integrationslösungen',
            'Smart Manufacturing Integration Solutions' => 'Integrationslösungen für intelligente Fertigung',
            'Automation Integration Solutions' => 'Lösungen für Automatisierungsintegration',
            'Industrial Robot Product Series' => 'Produktserie Industrieroboter',
            'Collaborative Robot Product Series' => 'Produktserie kollaborative Roboter',
            'AGV Intelligent Handling Systems' => 'Intelligente AGV-Handling-Systeme',
            'Automation · Robotics · Process Development · Machine and Control' => 'Automatisierung · Robotik · Prozessentwicklung · Maschine und Steuerung',
            'Typical Applications' => 'Typische Anwendungen',
            'Industry Scenarios' => 'Branchenszenarien',
            'Industry Application Scenarios' => 'Branchen-Anwendungsszenarien',
            'Automation Workstations' => 'Automatisierungsarbeitsstationen',
            'Automation Integration Service System' => 'Servicesystem für Automatisierungsintegration',
            'Intelligent Project Delivery System' => 'Intelligentes Projektliefersystem',
            'Remote O&M and Technical Support' => 'Remote-Betrieb und technischer Support',
            'One-stop Turnkey Engineering' => 'Schlüsselfertige Kompletttechnik',
            'Smart scenario solutions based on industry experience' => 'Intelligente Szenariolösungen auf Basis von Branchenerfahrung',
            'Industrial and collaborative robot systems matched to real production processes.' => 'Industrie- und kollaborative Robotersysteme passend zu realen Produktionsprozessen.',
            'Explore Solutions' => 'Lösungen entdecken',
            'Consult Project' => 'Projekt anfragen',
            'Explore Products' => 'Produkte entdecken',
            'Submit Automation Requirement' => 'Automatisierungsbedarf senden',
            'Project Consultation' => 'Projektberatung',
            'Technical Discussion' => 'Technische Abstimmung',
            'Service Scope' => 'Leistungsumfang',
            'Industrial' => 'Industriell',
            'Collaborative' => 'Kollaborativ',
            'Typical' => 'Typisch',
            'Scenarios' => 'Szenarien',
            'Scenario' => 'Szenario',
            'Intelligent' => 'Intelligent',
            'Smart' => 'Smart',
            'Delivery' => 'Lieferung',
            'Technical' => 'Technisch',
            'Remote O&M' => 'Remote-O&M',
            'Heavy Equipment' => 'Schwermaschinen',
            'Systems' => 'Systeme',
            'Workstations' => 'Arbeitsstationen',
            'Robotics' => 'Robotik',
            'Process Development' => 'Prozessentwicklung',
            'Machine and Control' => 'Maschine und Steuerung',
            'Machine' => 'Maschine',
            'Control' => 'Steuerung',
            'Explore' => 'Entdecken',
            'Consult' => 'Beraten',
            'Online' => 'Online',
            'Center' => 'Center',
            'and' => 'und',
            'with' => 'mit',
            'for' => 'für',
        ],
        'fr' => [
            'One-stop Automation Integration Solutions' => 'Solutions intégrées d’automatisation clés en main',
            'Industrial Robot and Automation Integration Solutions' => 'Solutions de robots industriels et d’intégration d’automatisation',
            'Intelligent Integration Solutions' => 'Solutions d’intégration intelligente',
            'Smart Manufacturing Integration Solutions' => 'Solutions d’intégration de fabrication intelligente',
            'Automation Integration Solutions' => 'Solutions d’intégration d’automatisation',
            'Industrial Robot Product Series' => 'Série de robots industriels',
            'Collaborative Robot Product Series' => 'Série de robots collaboratifs',
            'AGV Intelligent Handling Systems' => 'Systèmes AGV intelligents de manutention',
            'Automation · Robotics · Process Development · Machine and Control' => 'Automatisation · Robotique · Développement de procédé · Machine et contrôle',
            'Typical Applications' => 'Applications typiques',
            'Industry Scenarios' => 'Scénarios industriels',
            'Industry Application Scenarios' => 'Scénarios d’application industrielle',
            'Automation Workstations' => 'Postes d’automatisation',
            'Automation Integration Service System' => 'Système de service d’intégration d’automatisation',
            'Intelligent Project Delivery System' => 'Système intelligent de livraison de projet',
            'Remote O&M and Technical Support' => 'Exploitation à distance et support technique',
            'One-stop Turnkey Engineering' => 'Ingénierie clé en main intégrée',
            'Smart scenario solutions based on industry experience' => 'Solutions de scénarios intelligents basées sur l’expérience industrielle',
            'Industrial and collaborative robot systems matched to real production processes.' => 'Systèmes de robots industriels et collaboratifs adaptés aux processus réels.',
            'Explore Solutions' => 'Explorer les solutions',
            'Consult Project' => 'Consulter un projet',
            'Explore Products' => 'Explorer les produits',
            'Submit Automation Requirement' => 'Envoyer un besoin d’automatisation',
            'Project Consultation' => 'Consultation de projet',
            'Technical Discussion' => 'Échange technique',
            'Service Scope' => 'Périmètre de service',
            'Industrial' => 'Industriel',
            'Collaborative' => 'Collaboratif',
            'Typical' => 'Typique',
            'Scenarios' => 'Scénarios',
            'Scenario' => 'Scénario',
            'Intelligent' => 'Intelligent',
            'Smart' => 'Intelligent',
            'Delivery' => 'Livraison',
            'Technical' => 'Technique',
            'Remote O&M' => 'O&M à distance',
            'Heavy Equipment' => 'Équipements lourds',
            'Systems' => 'Systèmes',
            'Workstations' => 'Postes robotisés',
            'Robotics' => 'Robotique',
            'Process Development' => 'Développement de procédé',
            'Machine and Control' => 'Machine et contrôle',
            'Machine' => 'Machine',
            'Control' => 'Contrôle',
            'Explore' => 'Explorer',
            'Consult' => 'Consulter',
            'Online' => 'En ligne',
            'Center' => 'Centre',
            'and' => 'et',
            'with' => 'avec',
            'for' => 'pour',
        ],
        'th' => [
            'One-stop Automation Integration Solutions' => 'โซลูชันบูรณาการระบบอัตโนมัติแบบครบวงจร',
            'Industrial Robot and Automation Integration Solutions' => 'โซลูชันหุ่นยนต์อุตสาหกรรมและบูรณาการระบบอัตโนมัติ',
            'Intelligent Integration Solutions' => 'โซลูชันบูรณาการอัจฉริยะ',
            'Smart Manufacturing Integration Solutions' => 'โซลูชันบูรณาการการผลิตอัจฉริยะ',
            'Automation Integration Solutions' => 'โซลูชันบูรณาการระบบอัตโนมัติ',
            'Industrial Robot Product Series' => 'ซีรีส์หุ่นยนต์อุตสาหกรรม',
            'Collaborative Robot Product Series' => 'ซีรีส์หุ่นยนต์ร่วมปฏิบัติงาน',
            'AGV Intelligent Handling Systems' => 'ระบบ AGV ลำเลียงอัจฉริยะ',
            'Automation · Robotics · Process Development · Machine and Control' => 'ระบบอัตโนมัติ · หุ่นยนต์ · พัฒนากระบวนการ · เครื่องจักรและการควบคุม',
            'Typical Applications' => 'การใช้งานทั่วไป',
            'Industry Scenarios' => 'สถานการณ์อุตสาหกรรม',
            'Industry Application Scenarios' => 'สถานการณ์การใช้งานในอุตสาหกรรม',
            'Automation Workstations' => 'สถานีงานระบบอัตโนมัติ',
            'Automation Integration Service System' => 'ระบบบริการบูรณาการอัตโนมัติ',
            'Intelligent Project Delivery System' => 'ระบบส่งมอบโครงการอัจฉริยะ',
            'Remote O&M and Technical Support' => 'การบำรุงรักษาระยะไกลและการสนับสนุนทางเทคนิค',
            'One-stop Turnkey Engineering' => 'วิศวกรรมแบบครบวงจร',
            'Smart scenario solutions based on industry experience' => 'โซลูชันสถานการณ์อัจฉริยะจากประสบการณ์อุตสาหกรรม',
            'Industrial and collaborative robot systems matched to real production processes.' => 'ระบบหุ่นยนต์อุตสาหกรรมและหุ่นยนต์ร่วมปฏิบัติงานที่สอดคล้องกับกระบวนการจริง',
            'Explore Solutions' => 'สำรวจโซลูชัน',
            'Consult Project' => 'ปรึกษาโครงการ',
            'Explore Products' => 'สำรวจผลิตภัณฑ์',
            'Submit Automation Requirement' => 'ส่งความต้องการระบบอัตโนมัติ',
            'Project Consultation' => 'ปรึกษาโครงการ',
            'Technical Discussion' => 'หารือทางเทคนิค',
            'Service Scope' => 'ขอบเขตบริการ',
            'Industrial' => 'อุตสาหกรรม',
            'Collaborative' => 'ร่วมปฏิบัติงาน',
            'Typical' => 'ทั่วไป',
            'Scenarios' => 'สถานการณ์',
            'Scenario' => 'สถานการณ์',
            'Intelligent' => 'อัจฉริยะ',
            'Smart' => 'อัจฉริยะ',
            'Delivery' => 'ส่งมอบ',
            'Technical' => 'เทคนิค',
            'Remote O&M' => 'บำรุงรักษาระยะไกล',
            'Heavy Equipment' => 'อุปกรณ์หนัก',
            'Systems' => 'ระบบ',
            'Workstations' => 'สถานีงาน',
            'Robotics' => 'เทคโนโลยีหุ่นยนต์',
            'Process Development' => 'การพัฒนากระบวนการ',
            'Machine and Control' => 'เครื่องจักรและการควบคุม',
            'Machine' => 'เครื่องจักร',
            'Control' => 'การควบคุม',
            'Explore' => 'สำรวจ',
            'Consult' => 'ปรึกษา',
            'Online' => 'ออนไลน์',
            'Center' => 'ศูนย์',
            'and' => 'และ',
            'with' => 'พร้อม',
            'for' => 'สำหรับ',
        ],
        'ko' => [
            'One-stop Automation Integration Solutions' => '원스톱 자동화 통합 솔루션',
            'Industrial Robot and Automation Integration Solutions' => '산업용 로봇 및 자동화 통합 솔루션',
            'Intelligent Integration Solutions' => '지능형 통합 솔루션',
            'Smart Manufacturing Integration Solutions' => '스마트 제조 통합 솔루션',
            'Automation Integration Solutions' => '자동화 통합 솔루션',
            'Industrial Robot Product Series' => '산업용 로봇 제품 시리즈',
            'Collaborative Robot Product Series' => '협동 로봇 제품 시리즈',
            'AGV Intelligent Handling Systems' => 'AGV 지능형 이송 시스템',
            'Automation · Robotics · Process Development · Machine and Control' => '자동화 · 로봇 기술 · 공정 개발 · 기계와 제어',
            'Typical Applications' => '대표 적용 분야',
            'Industry Scenarios' => '산업 시나리오',
            'Industry Application Scenarios' => '산업 적용 시나리오',
            'Automation Workstations' => '자동화 워크스테이션',
            'Automation Integration Service System' => '자동화 통합 서비스 체계',
            'Intelligent Project Delivery System' => '지능형 프로젝트 납품 체계',
            'Remote O&M and Technical Support' => '원격 유지보수 및 기술 지원',
            'One-stop Turnkey Engineering' => '원스톱 턴키 엔지니어링',
            'Smart scenario solutions based on industry experience' => '산업 경험 기반 스마트 시나리오 솔루션',
            'Industrial and collaborative robot systems matched to real production processes.' => '실제 생산 공정에 맞춘 산업용 및 협동 로봇 시스템.',
            'Explore Solutions' => '솔루션 보기',
            'Consult Project' => '프로젝트 상담',
            'Explore Products' => '제품 보기',
            'Submit Automation Requirement' => '자동화 요구 제출',
            'Project Consultation' => '프로젝트 상담',
            'Technical Discussion' => '기술 상담',
            'Service Scope' => '서비스 범위',
            'Industrial' => '산업용',
            'Collaborative' => '협동',
            'Typical' => '대표',
            'Scenarios' => '시나리오',
            'Scenario' => '시나리오',
            'Intelligent' => '지능형',
            'Smart' => '스마트',
            'Delivery' => '납품',
            'Technical' => '기술',
            'Remote O&M' => '원격 유지보수',
            'Heavy Equipment' => '중장비',
            'Systems' => '시스템',
            'Workstations' => '워크스테이션',
            'Robotics' => '로봇 기술',
            'Process Development' => '공정 개발',
            'Machine and Control' => '기계와 제어',
            'Machine' => '기계',
            'Control' => '제어',
            'Explore' => '보기',
            'Consult' => '상담',
            'Online' => '온라인',
            'Center' => '센터',
            'and' => '및',
            'with' => '와',
            'for' => '대상',
        ],
        'it' => [
            'One-stop Automation Integration Solutions' => 'Soluzioni integrate di automazione chiavi in mano',
            'Industrial Robot and Automation Integration Solutions' => 'Soluzioni per robot industriali e integrazione automazione',
            'Intelligent Integration Solutions' => 'Soluzioni di integrazione intelligente',
            'Smart Manufacturing Integration Solutions' => 'Soluzioni di integrazione per produzione intelligente',
            'Automation Integration Solutions' => 'Soluzioni di integrazione automazione',
            'Industrial Robot Product Series' => 'Serie di robot industriali',
            'Collaborative Robot Product Series' => 'Serie di robot collaborativi',
            'AGV Intelligent Handling Systems' => 'Sistemi AGV intelligenti di movimentazione',
            'Automation · Robotics · Process Development · Machine and Control' => 'Automazione · Robotica · Sviluppo processo · Macchina e controllo',
            'Typical Applications' => 'Applicazioni tipiche',
            'Industry Scenarios' => 'Scenari industriali',
            'Industry Application Scenarios' => 'Scenari applicativi industriali',
            'Automation Workstations' => 'Stazioni di automazione',
            'Automation Integration Service System' => 'Sistema di servizio per integrazione automazione',
            'Intelligent Project Delivery System' => 'Sistema intelligente di consegna progetto',
            'Remote O&M and Technical Support' => 'O&M remoto e supporto tecnico',
            'One-stop Turnkey Engineering' => 'Ingegneria chiavi in mano integrata',
            'Smart scenario solutions based on industry experience' => 'Soluzioni intelligenti basate sull’esperienza industriale',
            'Industrial and collaborative robot systems matched to real production processes.' => 'Sistemi robotici industriali e collaborativi adattati ai processi reali.',
            'Explore Solutions' => 'Esplora soluzioni',
            'Consult Project' => 'Consulta progetto',
            'Explore Products' => 'Esplora prodotti',
            'Submit Automation Requirement' => 'Invia requisito di automazione',
            'Project Consultation' => 'Consulenza progetto',
            'Technical Discussion' => 'Discussione tecnica',
            'Service Scope' => 'Ambito servizio',
            'Industrial' => 'Industriale',
            'Collaborative' => 'Collaborativo',
            'Typical' => 'Tipico',
            'Scenarios' => 'Scenari',
            'Scenario' => 'Scenario',
            'Intelligent' => 'Intelligente',
            'Smart' => 'Smart',
            'Delivery' => 'Consegna',
            'Technical' => 'Tecnico',
            'Remote O&M' => 'O&M remoto',
            'Heavy Equipment' => 'Attrezzature pesanti',
            'Systems' => 'Sistemi',
            'Workstations' => 'Stazioni di lavoro',
            'Robotics' => 'Robotica',
            'Process Development' => 'Sviluppo processo',
            'Machine and Control' => 'Macchina e controllo',
            'Machine' => 'Macchina',
            'Control' => 'Controllo',
            'Explore' => 'Esplora',
            'Consult' => 'Consulta',
            'Online' => 'Online',
            'Center' => 'Centro',
            'and' => 'e',
            'with' => 'con',
            'for' => 'per',
        ],
        'vi' => [
            'One-stop Automation Integration Solutions' => 'Giải pháp tích hợp tự động hóa trọn gói',
            'Industrial Robot and Automation Integration Solutions' => 'Giải pháp robot công nghiệp và tích hợp tự động hóa',
            'Intelligent Integration Solutions' => 'Giải pháp tích hợp thông minh',
            'Smart Manufacturing Integration Solutions' => 'Giải pháp tích hợp sản xuất thông minh',
            'Automation Integration Solutions' => 'Giải pháp tích hợp tự động hóa',
            'Industrial Robot Product Series' => 'Dòng robot công nghiệp',
            'Collaborative Robot Product Series' => 'Dòng robot cộng tác',
            'AGV Intelligent Handling Systems' => 'Hệ thống AGV vận chuyển thông minh',
            'Automation · Robotics · Process Development · Machine and Control' => 'Tự động hóa · Robot · Phát triển quy trình · Máy móc và điều khiển',
            'Typical Applications' => 'Ứng dụng tiêu biểu',
            'Industry Scenarios' => 'Kịch bản ngành',
            'Industry Application Scenarios' => 'Kịch bản ứng dụng ngành',
            'Automation Workstations' => 'Trạm tự động hóa',
            'Automation Integration Service System' => 'Hệ thống dịch vụ tích hợp tự động hóa',
            'Intelligent Project Delivery System' => 'Hệ thống bàn giao dự án thông minh',
            'Remote O&M and Technical Support' => 'Vận hành bảo trì từ xa và hỗ trợ kỹ thuật',
            'One-stop Turnkey Engineering' => 'Kỹ thuật chìa khóa trao tay trọn gói',
            'Smart scenario solutions based on industry experience' => 'Giải pháp kịch bản thông minh dựa trên kinh nghiệm ngành',
            'Industrial and collaborative robot systems matched to real production processes.' => 'Hệ thống robot công nghiệp và cộng tác phù hợp với quy trình sản xuất thực tế.',
            'Explore Solutions' => 'Khám phá giải pháp',
            'Consult Project' => 'Tư vấn dự án',
            'Explore Products' => 'Khám phá sản phẩm',
            'Submit Automation Requirement' => 'Gửi nhu cầu tự động hóa',
            'Project Consultation' => 'Tư vấn dự án',
            'Technical Discussion' => 'Trao đổi kỹ thuật',
            'Service Scope' => 'Phạm vi dịch vụ',
            'Industrial' => 'Công nghiệp',
            'Collaborative' => 'Cộng tác',
            'Typical' => 'Tiêu biểu',
            'Scenarios' => 'Kịch bản',
            'Scenario' => 'Kịch bản',
            'Intelligent' => 'Thông minh',
            'Smart' => 'Thông minh',
            'Delivery' => 'Bàn giao',
            'Technical' => 'Kỹ thuật',
            'Remote O&M' => 'O&M từ xa',
            'Heavy Equipment' => 'Thiết bị nặng',
            'Systems' => 'Hệ thống',
            'Workstations' => 'Trạm làm việc',
            'Robotics' => 'Robot',
            'Process Development' => 'Phát triển quy trình',
            'Machine and Control' => 'Máy móc và điều khiển',
            'Machine' => 'Máy móc',
            'Control' => 'Điều khiển',
            'Explore' => 'Khám phá',
            'Consult' => 'Tư vấn',
            'Online' => 'Trực tuyến',
            'Center' => 'Trung tâm',
            'and' => 'và',
            'with' => 'với',
            'for' => 'cho',
        ],
    ];

    return $sets[$lang] ?? [];
}

function chenxuan_locale_common_phrase_terms($lang) {
    $sets = [
        'ja' => [
            'Customized industrial robot automation system integration' => 'カスタム産業用ロボット自動化システム統合',
            'Explore ChenXuan customized automation solutions' => 'ChenXuanのカスタム自動化ソリューションを見る',
            'View Product Series' => '製品シリーズを見る',
            'Application Cases' => '導入事例',
            'Customized Automation Solutions' => 'カスタム自動化ソリューション',
            'automation solutions' => '自動化ソリューション',
            'customized automation solutions' => 'カスタム自動化ソリューション',
            'Cases' => '事例',
            'View' => '見る',
            'Customized' => 'カスタム',
        ],
        'es' => [
            'Customized industrial robot automation system integration' => 'Integración personalizada de sistemas de automatización con robots industriales',
            'Explore ChenXuan customized automation solutions' => 'Explorar soluciones de automatización personalizadas de ChenXuan',
            'View Product Series' => 'Ver serie de productos',
            'Application Cases' => 'Casos de aplicación',
            'Customized Automation Solutions' => 'Soluciones de automatización personalizadas',
            'automation solutions' => 'soluciones de automatización',
            'customized automation solutions' => 'soluciones de automatización personalizadas',
            'Cases' => 'Casos',
            'View' => 'Ver',
            'Customized' => 'Personalizado',
        ],
        'de' => [
            'Customized industrial robot automation system integration' => 'Kundenspezifische Integration industrieller Roboterautomatisierung',
            'Explore ChenXuan customized automation solutions' => 'ChenXuan-Lösungen für kundenspezifische Automatisierung entdecken',
            'View Product Series' => 'Produktserie anzeigen',
            'Application Cases' => 'Anwendungsfälle',
            'Customized Automation Solutions' => 'Kundenspezifische Automatisierungslösungen',
            'automation solutions' => 'Automatisierungslösungen',
            'customized automation solutions' => 'kundenspezifische Automatisierungslösungen',
            'Cases' => 'Fälle',
            'View' => 'Anzeigen',
            'Customized' => 'Kundenspezifisch',
        ],
        'fr' => [
            'Customized industrial robot automation system integration' => 'Intégration personnalisée de systèmes d’automatisation robotique industrielle',
            'Explore ChenXuan customized automation solutions' => 'Explorer les solutions d’automatisation personnalisées de ChenXuan',
            'View Product Series' => 'Voir la série de produits',
            'Application Cases' => 'Cas d’application',
            'Customized Automation Solutions' => 'Solutions d’automatisation personnalisées',
            'automation solutions' => 'solutions d’automatisation',
            'customized automation solutions' => 'solutions d’automatisation personnalisées',
            'Cases' => 'Cas',
            'View' => 'Voir',
            'Customized' => 'Personnalisé',
        ],
        'th' => [
            'Customized industrial robot automation system integration' => 'การบูรณาการระบบอัตโนมัติหุ่นยนต์อุตสาหกรรมแบบปรับแต่ง',
            'Explore ChenXuan customized automation solutions' => 'สำรวจโซลูชันอัตโนมัติแบบปรับแต่งของ ChenXuan',
            'View Product Series' => 'ดูซีรีส์ผลิตภัณฑ์',
            'Application Cases' => 'กรณีการใช้งาน',
            'Customized Automation Solutions' => 'โซลูชันอัตโนมัติแบบปรับแต่ง',
            'automation solutions' => 'โซลูชันอัตโนมัติ',
            'customized automation solutions' => 'โซลูชันอัตโนมัติแบบปรับแต่ง',
            'Cases' => 'กรณี',
            'View' => 'ดู',
            'Customized' => 'ปรับแต่ง',
        ],
        'ko' => [
            'Customized industrial robot automation system integration' => '맞춤형 산업용 로봇 자동화 시스템 통합',
            'Explore ChenXuan customized automation solutions' => 'ChenXuan 맞춤형 자동화 솔루션 보기',
            'View Product Series' => '제품 시리즈 보기',
            'Application Cases' => '적용 사례',
            'Customized Automation Solutions' => '맞춤형 자동화 솔루션',
            'automation solutions' => '자동화 솔루션',
            'customized automation solutions' => '맞춤형 자동화 솔루션',
            'Cases' => '사례',
            'View' => '보기',
            'Customized' => '맞춤형',
        ],
        'it' => [
            'Customized industrial robot automation system integration' => 'Integrazione personalizzata di sistemi di automazione robotica industriale',
            'Explore ChenXuan customized automation solutions' => 'Esplora le soluzioni di automazione personalizzate ChenXuan',
            'View Product Series' => 'Vedi serie prodotti',
            'Application Cases' => 'Casi applicativi',
            'Customized Automation Solutions' => 'Soluzioni di automazione personalizzate',
            'automation solutions' => 'soluzioni di automazione',
            'customized automation solutions' => 'soluzioni di automazione personalizzate',
            'Cases' => 'Casi',
            'View' => 'Vedi',
            'Customized' => 'Personalizzato',
        ],
        'vi' => [
            'Customized industrial robot automation system integration' => 'Tích hợp hệ thống tự động hóa robot công nghiệp tùy chỉnh',
            'Explore ChenXuan customized automation solutions' => 'Khám phá giải pháp tự động hóa tùy chỉnh của ChenXuan',
            'View Product Series' => 'Xem dòng sản phẩm',
            'Application Cases' => 'Trường hợp ứng dụng',
            'Customized Automation Solutions' => 'Giải pháp tự động hóa tùy chỉnh',
            'automation solutions' => 'giải pháp tự động hóa',
            'customized automation solutions' => 'giải pháp tự động hóa tùy chỉnh',
            'Cases' => 'Trường hợp',
            'View' => 'Xem',
            'Customized' => 'Tùy chỉnh',
        ],
    ];

    return $sets[$lang] ?? [];
}

function chenxuan_translation_topic($text) {
    $lower = strtolower((string) $text);
    $checks = [
        'smart' => ['commerce', 'coffee', 'beverage', 'restaurant', 'retail', 'hotel', 'commercial'],
        'contact' => ['contact', 'request', 'consult', 'requirement', 'name', 'phone', 'email', 'company', 'message', 'form'],
        'download' => ['download', 'resource', 'guide', 'brief', 'training', 'maintenance'],
        'news' => ['news', 'insight', 'future', 'read'],
        'service' => ['service', 'support', 'delivery', 'training', 'o&m', 'maintenance', 'turnkey'],
        'product' => ['product', 'robot', 'series', 'machine tool', 'positioner', 'accessories'],
        'solution' => ['solution', 'industry', 'application', 'process', 'workstation', 'automation'],
        'case' => ['case', 'welding', 'spraying', 'handling', 'cutting', 'bending', 'stamping', 'engraving', 'workstation'],
    ];
    foreach ($checks as $topic => $needles) {
        foreach ($needles as $needle) {
            if (strpos($lower, $needle) !== false) {
                return $topic;
            }
        }
    }
    return 'generic';
}

function chenxuan_translate_from_english($english, $lang, $context = '') {
    if (in_array($lang, ['zh', 'zh_tw', 'en', 'en_eu'], true)) {
        return $english;
    }

    $profile = chenxuan_locale_profile($lang);
    if (!$profile) {
        return $english;
    }

    $text = trim((string) $english);
    if ($text === '') {
        return $text;
    }

    if (isset($profile['exact'][$text])) {
        return $profile['exact'][$text];
    }

    $topic = chenxuan_translation_topic($context . ' ' . $text);
    $is_long = mb_strlen($text, 'UTF-8') > 72 || preg_match('/[.!?;]/', $text);
    if ($is_long) {
        return $profile['topics'][$topic] ?? $profile['generic'];
    }

    $terms = chenxuan_locale_common_phrase_terms($lang) + chenxuan_locale_extra_terms($lang) + $profile['terms'];
    uksort($terms, function($a, $b) {
        return strlen($b) <=> strlen($a);
    });

    $translated = $text;
    foreach ($terms as $en => $localized) {
        $translated = str_replace($en, $localized, $translated);
    }

    if ($translated !== $text) {
        if (preg_match('/\b(customized|automation solutions?|application cases?|view product|learn more|read more)\b/i', $translated)) {
            return $profile['topics'][$topic] ?? $profile['generic'];
        }
        if (in_array($lang, ['ja', 'th', 'ko'], true)) {
            $clean = preg_replace('/\b(ChenXuan|AGV|FANUC|ABB|O&M|PDF|Cookie|EU)\b/u', '', $translated);
            if (preg_match('/[A-Za-z]{3,}/', $clean)) {
                return $profile['topics'][$topic] ?? $profile['generic'];
            }
        }
        return $translated;
    }

    return mb_strlen($text, 'UTF-8') > 24
        ? ($profile['topics'][$topic] ?? $profile['generic'])
        : ($profile['exact'][$text] ?? $profile['short']);
}

function chenxuan_l($text) {
    $lang = chenxuan_current_lang_code();
    if ($lang === 'zh') {
        return chenxuan_normalize_brand_copy($text);
    }
    if ($lang === 'zh_tw') {
        return chenxuan_to_traditional(chenxuan_normalize_brand_copy($text));
    }
    $map = chenxuan_content_en_map();
    $english = $map[$text] ?? null;
    if ($english === null && preg_match('/\p{Han}/u', $text)) {
        $english = chenxuan_translate_chinese_to_english($text);
    }
    if ($english === null || $english === '') {
        if (preg_match('/\p{Han}/u', $text)) {
            $english = mb_strlen($text, 'UTF-8') > 18
                ? 'ChenXuan delivers automation integration for real production scenarios, covering process planning, robot integration, control systems, on-site delivery and continuous support.'
                : 'ChenXuan';
        } else {
            $english = $text;
        }
    }
    return chenxuan_translate_from_english($english, $lang, $text);
}

function chenxuan_lx($zh, $en) {
    $lang = chenxuan_current_lang_code();
    if ($lang === 'zh') {
        return chenxuan_normalize_brand_copy($zh);
    }
    if ($lang === 'zh_tw') {
        return chenxuan_to_traditional(chenxuan_normalize_brand_copy($zh));
    }
    return chenxuan_translate_from_english($en, $lang, $zh);
}

function chenxuan_should_localize_array_string($value) {
    $text = trim((string) $value);
    if ($text === '') {
        return false;
    }
    if (preg_match('#^(https?:)?//#i', $text) || preg_match('#^(mailto:|tel:)#i', $text)) {
        return false;
    }
    if (preg_match('/\.(?:jpe?g|png|webp|gif|svg|avif|mp4|webm|pdf)(?:[?#].*)?$/i', $text)) {
        return false;
    }
    if (preg_match('/^\/[A-Za-z0-9._~\/?#&=%:+-]*$/', $text) || preg_match('/^#[0-9A-Fa-f]{3,8}$/', $text)) {
        return false;
    }
    if (preg_match('/^\d{4}[.\-\/]\d{1,2}[.\-\/]\d{1,2}$/', $text)) {
        return false;
    }
    if (preg_match('/^[a-z0-9_]+$/', $text) || preg_match('/^[a-z0-9]+(?:[-_][a-z0-9]+)+$/i', $text)) {
        return false;
    }

    return true;
}

function chenxuan_should_skip_localize_array_key($key) {
    return in_array((string) $key, [
        'bg',
        'btn1_url',
        'btn2_url',
        'class',
        'color',
        'family',
        'filter',
        'filter_series',
        'icon',
        'image',
        'key',
        'poster',
        'series',
        'short',
        'slug',
        'status',
        'tag',
        'url',
        'video',
    ], true);
}

function chenxuan_localize_array($value, $value_key = null) {
    if (is_array($value)) {
        foreach ($value as $key => $item) {
            $value[$key] = chenxuan_localize_array($item, $key);
        }
        return $value;
    }
    if ($value_key !== null && chenxuan_should_skip_localize_array_key($value_key)) {
        return $value;
    }
    return is_string($value) && chenxuan_should_localize_array_string($value) ? chenxuan_l($value) : $value;
}

function chenxuan_localize_html($html) {
    $html = (string) $html;
    if ($html === '' || !function_exists('chenxuan_l')) {
        return $html;
    }
    if (chenxuan_current_lang_code() === 'zh') {
        return $html;
    }

    $parts = preg_split('/(<[^>]+>)/u', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
    if ($parts === false) {
        return chenxuan_l(wp_strip_all_tags($html));
    }

    $skip_depth = 0;
    foreach ($parts as $index => $part) {
        if ($part === '') {
            continue;
        }
        if ($part[0] === '<') {
            if (preg_match('/^<\s*(script|style|svg|noscript)\b/i', $part)) {
                $skip_depth++;
            } elseif ($skip_depth > 0 && preg_match('/^<\s*\/\s*(script|style|svg|noscript)\b/i', $part)) {
                $skip_depth--;
            }
            continue;
        }
        if ($skip_depth > 0 || !preg_match('/[\p{Han}A-Za-z]/u', $part)) {
            continue;
        }

        $decoded = html_entity_decode($part, ENT_QUOTES | ENT_HTML5, get_bloginfo('charset') ?: 'UTF-8');
        if (!preg_match('/^(\s*)(.*?)(\s*)$/us', $decoded, $matches) || trim($matches[2]) === '') {
            continue;
        }

        $parts[$index] = esc_html($matches[1] . chenxuan_l($matches[2]) . $matches[3]);
    }

    return implode('', $parts);
}

function chenxuan_brand_name() {
    return chenxuan_l('辰轩机器人');
}

function chenxuan_short_name() {
    return chenxuan_l('辰轩');
}

function chenxuan_intro_primary() {
    return chenxuan_l('辰轩机器人专注于为制造企业提供定制化工业机器人自动化系统集成方案，帮助客户解决人工成本上升、生产效率瓶颈以及产品一致性控制等核心问题。');
}

function chenxuan_intro_secondary() {
    return chenxuan_l('可根据客户实际工艺需求，设计并交付完整的自动化解决方案，涵盖焊接、打磨、喷涂、搬运、码垛、机床上下料及装配等多种工业应用场景，确保系统在真实生产环境中稳定、高效运行。');
}

function chenxuan_welcome_message() {
    return chenxuan_l('感谢您访问辰轩，这里汇聚了前沿定制自动化技术与行业需求。请问有什么我可以帮您？');
}

function chenxuan_home_asset_url($path) {
    $url = trailingslashit(JAKA_URI) . 'assets/images/home/' . ltrim((string) $path, '/');
    return add_query_arg('v', JAKA_VERSION, $url);
}

function chenxuan_product_asset_url($path) {
    $url = trailingslashit(JAKA_URI) . 'assets/images/products/catalog/' . ltrim((string) $path, '/');
    return add_query_arg('v', JAKA_VERSION, $url);
}

function chenxuan_banner_slides() {
    $slides = chenxuan_localize_array([
        ['bg' => '', 'title' => '一站式自动化集成解决方案', 'desc' => '焊接 · 打磨 · 喷涂 · 搬运 · 装配', 'btn1' => '了解解决方案', 'btn1_url' => home_url('/solutions'), 'btn2' => '咨询项目', 'btn2_url' => home_url('/contact')],
        ['bg' => '', 'title' => '工业机器人与自动化集成解决方案', 'desc' => '焊接 · 打磨 · 喷涂 · 搬运 · 装配', 'btn1' => '查看产品系列', 'btn1_url' => home_url('/products'), 'btn2' => '服务体系', 'btn2_url' => home_url('/service')],
        ['bg' => '', 'title' => '智能集成解决方案', 'desc' => '自动化 · 机器人技术 · 工艺开发 · 机器与控制', 'btn1' => '行业场景', 'btn1_url' => home_url('/solutions'), 'btn2' => '了解辰轩', 'btn2_url' => home_url('/about')],
        ['bg' => '', 'title' => '智能制造集成解决方案', 'desc' => '围绕真实工艺需求设计、交付并持续优化稳定高效的自动化系统。', 'btn1' => '应用案例', 'btn1_url' => home_url('/cases'), 'btn2' => '提交需求', 'btn2_url' => home_url('/contact')],
    ]);

    $artwork = [
        ['bg' => chenxuan_home_asset_url('fit/banner/banner-01.jpg'), 'artwork_only' => true],
        ['bg' => chenxuan_home_asset_url('fit/banner/banner-02.jpg'), 'artwork_only' => true],
        ['bg' => chenxuan_home_asset_url('fit/banner/banner-video-04.jpg'), 'artwork_only' => true],
        ['bg' => chenxuan_home_asset_url('fit/banner/banner-video-05.jpg'), 'artwork_only' => true],
    ];

    foreach ($slides as $idx => $slide) {
        if (isset($artwork[$idx])) {
            $slides[$idx] = array_merge($slide, $artwork[$idx]);
        }
    }

    return $slides;
}

function chenxuan_product_families() {
    $families = chenxuan_localize_array([
        ['name' => '工业机器人产品系列', 'desc' => '具备高负载、高速度与高精度的核心优势，适用于复杂严苛的工业生产环境。', 'features' => ['高负载', '高速度', '高精度', '复杂工况'], 'placeholder' => 'industrial-robot'],
        ['name' => '协作机器人产品系列', 'desc' => '具备安全协作、灵活部署与易于编程的特点，可与人类在同一工作空间内安全配合完成作业。', 'features' => ['安全协作', '灵活部署', '易于编程', '人机协同'], 'placeholder' => 'collaborative-robot'],
    ]);

    $images = [
        chenxuan_home_asset_url('fit/family/industrial-family-16x9.png'),
        chenxuan_home_asset_url('fit/family/collaborative-family-16x9.png'),
    ];

    foreach ($families as $idx => $family) {
        $families[$idx]['image'] = $images[$idx] ?? '';
    }

    return $families;
}

function chenxuan_solutions() {
    return chenxuan_localize_array([
        ['工程机械行业', '应用于挖掘机、装载机、起重机、叉车、农机及重型设备零部件生产。', 'engineering-machinery', '#0a4da2'],
        ['汽车及零部件行业', '应用于保险杠喷涂、动力总成装配、电池包制造、车身焊接、零部件加工、搬运、检测及自动化生产。', 'automotive-parts', '#1a6bc4'],
        ['金属加工与钣金制造行业', '应用于钣金加工、机箱机柜、配电柜、电梯部件、暖通设备、厨房设备、医疗设备外壳及五金制品。', 'metal-fabrication', '#6b7280'],
        ['船舶和钢结构行业', '应用于船体、H型钢、拱架、钢结构件及重型装备的自动化焊接与柔性加工。', 'ship-steel-structure', '#334155'],
        ['环保清洁行业', '应用于工业清洁、粉尘清理、地面清洗及生产现场无人化清洁作业。', 'environmental-cleaning', '#0d8a5f'],
    ]);
}

function chenxuan_solution_primary_case_slugs() {
    return [
        'engineering-machinery' => 'excavator-bucket-welding',
        'automotive-parts' => 'bumper-spraying',
        'metal-fabrication' => 'cabinet-welding',
        'ship-steel-structure' => 'h-beam-arch-welding',
        'environmental-cleaning' => 'industrial-cleaning-robot',
    ];
}

function chenxuan_case_industries() {
    return chenxuan_localize_array(['工程机械', '汽车及零部件', '金属加工', '船舶和钢结构行业', '环保清洁行业']);
}

function chenxuan_case_fields() {
    return chenxuan_localize_array(['工程机械', '汽车及零部件', '金属加工', '船舶和钢结构行业', '医疗设备行业（遥操作）', '物流仓储（AGV）', '服务行业', '智能制造']);
}

function chenxuan_case_applications() {
    return chenxuan_localize_array(['焊接', '喷涂', '搬运', '切割', '折弯', '点胶', '上下料', '打磨', '冲压', '雕刻', '清洁']);
}

function chenxuan_applications() {
    return chenxuan_localize_array(['焊接', '喷涂', '搬运', '切割', '折弯', '点胶', '上下料', '打磨', '冲压', '雕刻', '码垛', '装配', '检测']);
}

function chenxuan_services() {
    $services = chenxuan_localize_array([
        ['badge' => '交钥匙', 'title' => '一站式交钥匙工程', 'desc' => '从方案设计到现场交付的完整自动化系统集成。'],
        ['badge' => '项目交付', 'title' => '智能项目交付体系', 'desc' => '标准化管理 + 非标定制，保障系统稳定高效运行。'],
        ['badge' => '远程运维', 'title' => '远程运维与技术支持', 'desc' => '快速响应现场问题，持续优化系统性能。'],
    ]);

    $images = [
        chenxuan_home_asset_url('fit/service/system-solution.jpg'),
        chenxuan_home_asset_url('fit/service/turnkey-project.jpg'),
        chenxuan_home_asset_url('fit/service/support-training.jpg'),
    ];

    foreach ($services as $idx => $service) {
        $services[$idx]['image'] = $images[$idx] ?? '';
    }

    return $services;
}

function chenxuan_service_asset_url($path) {
    return trailingslashit(JAKA_URI) . 'assets/images/service-support/' . ltrim($path, '/');
}

function chenxuan_service_capabilities() {
    return [
        [
            'title' => chenxuan_lx('7×24小时快速响应服务', '24/7 Rapid Response Service'),
            'desc' => chenxuan_lx('通过远程诊断、电话沟通与工程协同，快速响应现场问题，最大限度减少停机影响。', 'Remote diagnosis, phone communication and engineering coordination help respond quickly to site issues and reduce downtime.'),
        ],
        [
            'title' => chenxuan_lx('专业化机器人技术支持', 'Professional Robot Technical Support'),
            'desc' => chenxuan_lx('围绕机器人、焊接电源、工装夹具、控制系统与工艺参数提供专业技术支持。', 'Professional support covers robots, welding power sources, fixtures, control systems and process parameters.'),
        ],
        [
            'title' => chenxuan_lx('全流程项目服务跟踪', 'Full-process Project Service Tracking'),
            'desc' => chenxuan_lx('从需求评估、方案设计、生产制造、安装调试到后期维护，持续跟进项目状态。', 'Project status is tracked from requirement evaluation, solution design and manufacturing to installation, commissioning and maintenance.'),
        ],
        [
            'title' => chenxuan_lx('智能化自动化解决方案', 'Intelligent Automation Solutions'),
            'desc' => chenxuan_lx('结合现场工艺、产能目标与设备接口，为客户规划稳定可落地的自动化系统。', 'Stable and executable automation systems are planned around site processes, capacity targets and equipment interfaces.'),
        ],
        [
            'title' => chenxuan_lx('行业领先机器人应用培训', 'Leading Robot Application Training'),
            'desc' => chenxuan_lx('提供操作、安全、编程、维护和工艺应用培训，帮助客户团队快速掌握设备使用。', 'Training covers operation, safety, programming, maintenance and process application so customer teams can use equipment confidently.'),
        ],
    ];
}

function chenxuan_service_guarantees() {
    return [
        [
            'title' => chenxuan_lx('远程技术支持', 'Remote Technical Support'),
            'desc' => chenxuan_lx('通过在线沟通和远程诊断快速定位问题。', 'Locate issues quickly through online communication and remote diagnosis.'),
        ],
        [
            'title' => chenxuan_lx('自动化方案设计', 'Automation Solution Design'),
            'desc' => chenxuan_lx('结合工件、节拍、现场空间和工艺要求输出方案。', 'Create solutions based on workpieces, takt time, site space and process requirements.'),
        ],
        [
            'title' => chenxuan_lx('在线打样评估', 'Online Sample Evaluation'),
            'desc' => chenxuan_lx('根据图纸、样件或视频资料进行工艺可行性判断。', 'Evaluate process feasibility using drawings, samples or video materials.'),
        ],
        [
            'title' => chenxuan_lx('3D方案演示', '3D Solution Demonstration'),
            'desc' => chenxuan_lx('通过三维方案展示设备布局、机器人动作和工艺流程。', 'Use 3D presentation to show layout, robot motion and process flow.'),
        ],
        [
            'title' => chenxuan_lx('设备选型服务', 'Equipment Selection Service'),
            'desc' => chenxuan_lx('匹配机器人、变位机、地轨、焊机、夹具和安全系统。', 'Match robots, positioners, tracks, welders, fixtures and safety systems.'),
        ],
        [
            'title' => chenxuan_lx('工艺技术支持', 'Process Technical Support'),
            'desc' => chenxuan_lx('围绕焊接、喷涂、打磨、搬运等工艺持续优化参数。', 'Continuously optimize parameters for welding, spraying, grinding and handling processes.'),
        ],
        [
            'title' => chenxuan_lx('远程培训服务', 'Remote Training Service'),
            'desc' => chenxuan_lx('为客户团队提供远程操作、维护和应用培训。', 'Provide remote operation, maintenance and application training for customer teams.'),
        ],
    ];
}

function chenxuan_global_stats() {
    return [
        ['value' => '30+', 'label' => chenxuan_lx('服务国家和地区', 'Service Countries and Regions')],
        ['value' => '50+', 'label' => chenxuan_lx('国际行业展会', 'International Industry Exhibitions')],
        ['value' => '1000+', 'label' => chenxuan_lx('全球客户接洽', 'Global Customer Contacts')],
        ['value' => '100+', 'label' => chenxuan_lx('海外合作伙伴', 'Overseas Partners')],
    ];
}

function chenxuan_service_faqs() {
    return [
        [
            'q' => chenxuan_lx('辰轩机器人主要提供哪些产品和服务？', 'What products and services does ChenXuan Robotics mainly provide?'),
            'a' => chenxuan_lx('山东辰轩机器人科技有限公司专注于工业机器人系统集成与智能制造解决方案，为客户提供机器人焊接工作站、智能喷涂系统、打磨抛光设备、自动上下料系统、机器人第七轴地轨、变位机以及自动化生产线整体集成服务。', 'Shandong ChenXuan Robot Technology Co., Ltd. focuses on industrial robot system integration and smart manufacturing solutions, providing robotic welding workstations, intelligent spraying systems, grinding and polishing equipment, automatic loading and unloading systems, robot seventh-axis tracks, positioners and complete automation line integration services.'),
        ],
        [
            'q' => chenxuan_lx('辰轩机器人能够提供定制化解决方案吗？', 'Can ChenXuan Robotics provide customized solutions?'),
            'a' => chenxuan_lx('可以。我们拥有专业的技术团队，可根据客户的工件类型、生产工艺、产能需求及现场环境，提供一对一自动化解决方案设计，实现从方案规划、设备制造到安装调试的全流程服务。', 'Yes. Our technical team can design one-to-one automation solutions based on workpiece type, production process, capacity demand and site environment, covering solution planning, equipment manufacturing, installation and commissioning.'),
        ],
        [
            'q' => chenxuan_lx('哪些行业适合使用机器人自动化设备？', 'Which industries are suitable for robotic automation equipment?'),
            'a' => chenxuan_lx('我们的解决方案广泛应用于钢结构、工程机械、汽车零部件、轨道交通、新能源、电力设备、金属加工、家具制造、厨具卫浴等多个行业。', 'Our solutions are widely used in steel structures, construction machinery, automotive parts, rail transit, new energy, power equipment, metal processing, furniture manufacturing, kitchenware and bathroom products.'),
        ],
        [
            'q' => chenxuan_lx('机器人焊接相比人工焊接有哪些优势？', 'What advantages does robotic welding have over manual welding?'),
            'a' => chenxuan_lx('机器人焊接具有焊接质量稳定、生产效率高、焊缝一致性好、降低人工成本、减少劳动强度以及可实现连续作业等优势，特别适合批量化和标准化生产。', 'Robotic welding offers stable quality, higher productivity, consistent weld seams, lower labor cost, reduced labor intensity and continuous operation, making it especially suitable for batch and standardized production.'),
        ],
        [
            'q' => chenxuan_lx('没有机器人使用经验，可以快速上手吗？', 'Can a team start quickly without robot experience?'),
            'a' => chenxuan_lx('可以。我们的设备支持标准化培训服务，工程师会提供设备操作、程序调试、日常维护等培训内容，帮助客户快速掌握机器人应用技能。', 'Yes. We provide standardized training, including equipment operation, program debugging and daily maintenance, so customer teams can quickly master robot application skills.'),
        ],
        [
            'q' => chenxuan_lx('设备安装调试周期需要多久？', 'How long does installation and commissioning take?'),
            'a' => chenxuan_lx('根据项目规模不同，通常标准设备可在较短时间内完成安装调试。对于定制化自动化产线，我们会根据项目方案制定详细实施计划，确保项目顺利交付。', 'The schedule depends on project scale. Standard equipment is usually installed and commissioned in a shorter period, while customized automation lines follow a detailed implementation plan to ensure smooth delivery.'),
        ],
        [
            'q' => chenxuan_lx('辰轩机器人可以提供试焊或样件测试吗？', 'Can ChenXuan provide trial welding or sample testing?'),
            'a' => chenxuan_lx('可以。客户可提供工件图纸、三维模型或样品，我们将根据实际需求进行工艺评估，并提供试焊、试喷涂或自动化方案验证服务。', 'Yes. Customers may provide drawings, 3D models or samples. We evaluate the process and provide trial welding, trial spraying or automation solution validation as needed.'),
        ],
        [
            'q' => chenxuan_lx('设备售后服务如何保障？', 'How is after-sales service guaranteed?'),
            'a' => chenxuan_lx('我们提供完善的售后服务体系，包括远程技术支持、在线故障诊断、现场技术服务、设备维护指导及备件支持，确保客户生产稳定运行。', 'We provide a complete after-sales service system, including remote technical support, online troubleshooting, on-site service, maintenance guidance and spare parts support to keep production stable.'),
        ],
        [
            'q' => chenxuan_lx('是否支持海外客户项目合作？', 'Do you support overseas project cooperation?'),
            'a' => chenxuan_lx('支持。辰轩机器人拥有丰富的国际项目经验，可为海外客户提供技术咨询、方案设计、设备出口、远程调试及技术培训等服务。', 'Yes. ChenXuan has international project experience and can provide technical consultation, solution design, equipment export, remote commissioning and technical training for overseas customers.'),
        ],
        [
            'q' => chenxuan_lx('如何获取产品报价和解决方案？', 'How can I get a quotation and solution?'),
            'a' => chenxuan_lx('您可以通过网站留言、电子邮件、电话或 WhatsApp 联系我们，并提供工件图片、图纸、工艺要求及产能需求。我们的工程师将尽快为您评估并提供专业方案和报价。', 'You can contact us through website messages, email, phone or WhatsApp and provide workpiece photos, drawings, process requirements and capacity needs. Our engineers will evaluate and provide a professional solution and quotation.'),
        ],
        [
            'q' => chenxuan_lx('客户需要提供哪些资料进行方案评估？', 'What information should customers provide for solution evaluation?'),
            'a' => chenxuan_lx('建议提供工件图片或产品照片、CAD图纸或3D模型、材料类型及厚度、焊缝形式或工艺要求、生产节拍及日产量要求、现场布局信息，以便更准确地制定方案。', 'We recommend providing workpiece or product photos, CAD drawings or 3D models, material type and thickness, weld form or process requirements, production takt and daily output requirements, and site layout information for accurate solution planning.'),
        ],
        [
            'q' => chenxuan_lx('为什么选择辰轩机器人？', 'Why choose ChenXuan Robotics?'),
            'a' => chenxuan_lx('辰轩机器人具备专业自动化集成经验、丰富的机器人应用案例、定制化方案能力、完善的售前与售后服务体系、快速响应能力以及面向全球市场的技术支持能力，致力于帮助客户提升生产效率、降低运营成本，实现智能制造升级。', 'ChenXuan combines automation integration experience, rich robot application cases, customized solution capability, complete pre-sales and after-sales service, fast response and global technical support to help customers improve productivity, reduce operating costs and upgrade smart manufacturing.'),
        ],
    ];
}

function chenxuan_after_sales_faqs() {
    return [
        ['q' => chenxuan_lx('设备质保期多久？', 'How long is the equipment warranty?'), 'a' => chenxuan_lx('设备整机质保通常为12个月，具体以合同约定为准。质保期内非人为损坏故障提供免费技术支持服务。', 'The whole machine warranty is usually 12 months, subject to the contract. During warranty, non-human-caused failures receive free technical support.')],
        ['q' => chenxuan_lx('是否提供安装调试服务？', 'Do you provide installation and commissioning service?'), 'a' => chenxuan_lx('提供。辰轩机器人可安排专业工程师进行现场安装、调试及操作培训，确保设备顺利投入生产。', 'Yes. ChenXuan can arrange professional engineers for on-site installation, commissioning and operation training to ensure smooth production start-up.')],
        ['q' => chenxuan_lx('是否提供操作培训？', 'Do you provide operation training?'), 'a' => chenxuan_lx('提供。培训内容包括机器人操作、安全规范、程序编辑、日常维护及简单故障处理等。', 'Yes. Training covers robot operation, safety rules, program editing, daily maintenance and basic troubleshooting.')],
        ['q' => chenxuan_lx('设备出现故障如何处理？', 'How are equipment failures handled?'), 'a' => chenxuan_lx('客户可通过电话、邮件、WhatsApp、微信等方式联系售后团队。技术工程师将优先远程诊断，并根据情况安排现场服务。', 'Customers can contact the after-sales team by phone, email, WhatsApp or WeChat. Technical engineers first perform remote diagnosis and arrange on-site service when needed.')],
        ['q' => chenxuan_lx('售后响应时间是多久？', 'What is the after-sales response time?'), 'a' => chenxuan_lx('工作时间内快速响应，一般2小时内给予技术回复，紧急问题优先处理，最大限度减少客户停机时间。', 'We respond quickly during working hours, usually providing a technical reply within 2 hours. Urgent issues are prioritized to reduce downtime.')],
        ['q' => chenxuan_lx('是否提供备件供应服务？', 'Do you provide spare parts supply?'), 'a' => chenxuan_lx('提供。常用易损件长期备货，可快速发货，保障客户设备稳定运行。', 'Yes. Common wearing parts are stocked long term and can be shipped quickly to support stable equipment operation.')],
        ['q' => chenxuan_lx('海外客户如何获得售后服务？', 'How do overseas customers receive after-sales service?'), 'a' => chenxuan_lx('我们支持远程技术支持、在线培训、视频指导以及海外现场服务，为全球客户提供持续的技术保障。', 'We support remote technical support, online training, video guidance and overseas on-site service to provide continuous technical assurance for global customers.')],
        ['q' => chenxuan_lx('设备后续升级是否方便？', 'Is later equipment upgrading convenient?'), 'a' => chenxuan_lx('支持软件升级、功能扩展及硬件升级，可根据客户生产需求变化进行持续优化。', 'Software upgrades, function expansion and hardware upgrades are supported, enabling continuous optimization as production needs change.')],
        ['q' => chenxuan_lx('是否提供定期维护服务？', 'Do you provide regular maintenance service?'), 'a' => chenxuan_lx('提供。根据客户需求制定预防性维护计划，定期检查设备运行状态，降低故障率。', 'Yes. Preventive maintenance plans can be made according to customer needs, with regular inspections to reduce failure rates.')],
        ['q' => chenxuan_lx('如何获得长期技术支持？', 'How can customers get long-term technical support?'), 'a' => chenxuan_lx('辰轩机器人建立全生命周期服务体系，从方案设计、安装调试到后期维护升级，为客户提供持续稳定的技术支持和服务保障。', 'ChenXuan has a full lifecycle service system, providing continuous technical support from solution design and installation to maintenance and upgrades.')],
    ];
}

function chenxuan_partnership_images() {
    $images = [];
    for ($i = 1; $i <= 11; $i++) {
        $images[] = [
            'src' => chenxuan_service_asset_url(sprintf('partnership/exhibition-client-%02d.jpg', $i)),
            'alt' => chenxuan_lx('战略合作展会签约客户', 'Strategic cooperation exhibition customer'),
            'caption' => chenxuan_lx('展会签约客户', 'Exhibition Customer Signing'),
        ];
    }
    return $images;
}

function chenxuan_project_gallery() {
    return [
        ['src' => chenxuan_service_asset_url('projects/project-welding-large-structure.jpg'), 'title' => chenxuan_lx('大型结构件自动焊接', 'Large Structure Automatic Welding')],
        ['src' => chenxuan_service_asset_url('projects/project-robot-workstation.jpg'), 'title' => chenxuan_lx('机器人工作站项目', 'Robot Workstation Project')],
        ['src' => chenxuan_service_asset_url('projects/project-agv-line.jpg'), 'title' => chenxuan_lx('AGV智能物流产线', 'AGV Intelligent Logistics Line')],
        ['src' => chenxuan_service_asset_url('projects/project-automation-line.jpg'), 'title' => chenxuan_lx('自动化生产单元', 'Automation Production Cell')],
        ['src' => chenxuan_service_asset_url('projects/project-welding-equipment.jpg'), 'title' => chenxuan_lx('焊接装备项目展示', 'Welding Equipment Project Showcase')],
    ];
}

function chenxuan_project_showcases() {
    return [
        ['url' => 'https://youtu.be/Vr0VAVMhmW4?si=okRQAzG7bVtTeQzz', 'title' => chenxuan_lx('机器人和自动化设备一一机器人切割使复杂工件切割变得简单', 'Robots and automation equipment make complex workpiece cutting simple')],
        ['url' => 'https://youtu.be/8PM_X8TuMAo?si=wiOuiVEKvuxExsmC', 'title' => chenxuan_lx('免编程焊接机器人 3D扫描焊接-我们的设备正在全面投入使用', 'Programming-free welding robot with 3D scanning welding is now fully in use')],
        ['url' => 'https://youtu.be/jUUjY2e70fU?si=0tF8nEvAGRUN01QL', 'title' => chenxuan_lx('焊接机器人 无需编程的焊接 拖车底盘焊接', 'Welding robot for programming-free trailer chassis welding')],
        ['url' => 'https://youtu.be/yCRXp5Um7Uw?si=bVXnsEQFrQRcIJDS', 'title' => chenxuan_lx('拖车底盘智能焊接解决方案（免编程焊接机器人）', 'Intelligent trailer chassis welding solution with programming-free welding robot')],
        ['url' => 'https://youtu.be/ZXNns2vxhgk?si=skEmIEQO6bSGe6g4', 'title' => chenxuan_lx('C型焊接定位器及悬臂式地轨系统，实现大型钢结构工件高效自动化焊接', 'C-type welding positioner and cantilever track system enable efficient automated welding of large steel structures')],
        ['url' => 'https://youtu.be/ntU_m9sD8ok?si=ldVNCAfAQI9Z8LIO', 'title' => chenxuan_lx('FANUC焊接机器人搭配轨道系统，满足大型框架结构焊接需求。', 'FANUC welding robot with track system meets large frame structure welding needs')],
        ['url' => 'https://youtu.be/pDSQUObzsYU?si=I5UE7Jcnsv5hii0J', 'title' => chenxuan_lx('视觉引导肉类饼智能分拣系统，实现高速、精准、稳定的自动化生产。生产节拍可达每分钟60个以上', 'Vision-guided intelligent meat patty sorting system enables fast, accurate and stable automation with more than 60 pieces per minute')],
        ['url' => 'https://youtu.be/NWHN47bMEy0?si=CzN7IngaHU9IyDrG', 'title' => chenxuan_lx('智能抛光机器人搭载高精度力控磨头，可实时调节接触压力，实现复杂曲面、异形工件的稳定研磨与抛光', 'Intelligent polishing robot with high-precision force-control grinding head stabilizes grinding and polishing for complex curved parts')],
        ['url' => 'https://youtu.be/Ektystry0iY?si=KxgltWolsPzIDnws', 'title' => chenxuan_lx('喷雾机器人采用智能轨迹控制技术，实现均匀、高效、稳定的自动喷涂作业', 'Spraying robot uses intelligent path control for uniform, efficient and stable automatic spraying')],
        ['url' => 'https://youtu.be/aYziSR2yctM?si=u1egrsxCiDqruz8i', 'title' => chenxuan_lx('一台机器人同时服务四台机床，实现工件自动上下料、设备联动及生产节拍优化', 'One robot serves four machine tools for automatic loading, equipment linkage and takt optimization')],
        ['url' => 'https://youtu.be/u0AxWvkMF5g?si=gbGLE37KegsziAUl', 'title' => chenxuan_lx('高速蜘蛛手机器人结合视觉识别系统，可实现食品的高速抓取、分拣、装盒和包装', 'High-speed spider robot with vision recognition enables fast food picking, sorting, boxing and packaging')],
        ['url' => 'https://youtu.be/Pk74dgHvZbg?si=o9SxXeShq5-1KjUt', 'title' => chenxuan_lx('工业清洁机器人可自主完成地面清扫、吸尘、洗地等作业，实现工厂、仓库及生产车间的智能化清洁管理', 'Industrial cleaning robot autonomously sweeps, vacuums and washes floors for intelligent cleaning management in factories, warehouses and workshops')],
    ];
}

function chenxuan_product_tree() {
    return chenxuan_localize_array([
        [
            'name' => '工业机器人产品系列',
            'active' => true,
            'groups' => [
                ['title' => 'Chenxuan Robot', 'series' => [
                    ['name' => '焊接机器人', 'models' => ['碳钢焊接', '不锈钢焊接', '铝合金焊接']],
                    ['name' => '喷涂机器人', 'models' => ['金属喷涂', '塑料喷涂', '复合材料喷涂']],
                    ['name' => '搬运、码垛机器人', 'models' => ['纸箱搬运', '袋装码垛', '工业产品搬运']],
                    ['name' => '切割机器人', 'models' => ['金属切割', '非金属切割', '高精度切割']],
                    ['name' => '抛光机器人', 'models' => ['自动打磨', '表面抛光', '复合材料处理']],
                    ['name' => '折弯机器人', 'models' => ['钣金折弯', '冲压上下料', '柔性加工']],
                    ['name' => '雕刻机器人', 'models' => ['木材雕刻', '金属雕刻', '石材雕刻']],
                    ['name' => '定位器和线性轨道', 'models' => ['多角度翻转', '作业范围扩展', '焊接效率提升']],
                ]],
            ],
        ],
        [
            'name' => '协作机器人产品系列',
            'groups' => [
                ['title' => '协作与复合应用', 'series' => [
                    ['name' => '协作焊接机器人', 'models' => ['安全协同', '重复作业', '危险工位替代']],
                    ['name' => '复合机器人', 'models' => ['移动底盘', '机械臂抓取', '自主搬运']],
                    ['name' => '视觉机器人', 'models' => ['目标识别', '精准抓取', '定位检测']],
                    ['name' => '机床', 'models' => ['切削加工', '钻孔铣削', '精密零件制造']],
                    ['name' => '咖啡机', 'models' => ['无人值守', '标准化出杯', '24小时服务']],
                    ['name' => '清洁机器人', 'models' => ['工业清洁', '标准化作业', '无人化运行']],
                    ['name' => '设备配件', 'models' => ['焊机', '焊枪', '系统稳定运行']],
                ]],
            ],
        ],
    ]);
}

function chenxuan_product_cards() {
    $cards = chenxuan_localize_array([
        ['name' => 'Chenxuan Robot', 'desc' => '面向工业机器人与自动化集成场景的产品能力集合。', 'tag' => 'SERIES', 'series' => 'industrial', 'family' => 'industrial', 'image' => 'industrial-robot.jpg'],
        ['name' => '焊接机器人', 'desc' => '可焊接碳钢、不锈钢、铝合金、镀锌板、铜及部分特殊合金等多种金属材料，应用于工业焊接场景。', 'tag' => 'HOT', 'series' => 'welding', 'family' => 'industrial', 'image' => 'welding-robot.jpg'],
        ['name' => '喷涂机器人', 'desc' => '可对金属、塑料、木材、玻璃、陶瓷及复合材料等多种材质进行自动喷涂，应用于工业表面处理场景。', 'tag' => '', 'series' => 'spraying', 'family' => 'industrial', 'image' => 'polishing-robot.jpg'],
        ['name' => '搬运、码垛机器人', 'desc' => '纸箱、袋装物料、桶装产品、板材、零部件及各类工业产品进行自动搬运、堆叠和码垛作业。', 'tag' => '', 'series' => 'handling', 'family' => 'industrial', 'image' => 'handling-palletizing.jpg'],
        ['name' => '切割机器人', 'desc' => '对碳钢、不锈钢、铝材、铜材及多种金属和非金属材料进行高精度自动切割加工。', 'tag' => '', 'series' => 'cutting', 'family' => 'industrial', 'image' => 'cutting-robot.jpg'],
        ['name' => '抛光机器人', 'desc' => '对金属、塑料、木材、玻璃、石材及复合材料等多种材质进行自动打磨和抛光处理。', 'tag' => '', 'series' => 'polishing', 'family' => 'industrial', 'image' => 'polishing-robot.jpg'],
        ['name' => '折弯机器人', 'desc' => '面向钣金与板材加工场景，实现稳定的自动折弯、冲压及搬运协同。', 'tag' => '', 'series' => 'bending', 'family' => 'industrial', 'image' => 'bending-robot.jpg'],
        ['name' => '雕刻机器人', 'desc' => '对木材、金属、石材、塑料、泡沫及复合材料等多种材质进行自动化精密雕刻加工。', 'tag' => '', 'series' => 'engraving', 'family' => 'industrial', 'image' => 'engraving-robot.jpg'],
        ['name' => '定位器和线性轨道', 'desc' => '实现工件多角度翻转、移动及扩大机器人作业范围，提高焊接与加工效率和精度。', 'tag' => '', 'series' => 'positioner', 'family' => 'industrial', 'image' => 'machine-tool.jpg'],
        ['name' => '协作焊接机器人', 'desc' => '安全协同工作的自动化机械手，用来帮人完成搬运、装配、焊接、上下料等重复或危险的工作。', 'tag' => 'COBOT', 'series' => 'cobot-welding', 'family' => 'collaborative', 'image' => 'cobot-welding.jpg'],
        ['name' => '复合机器人', 'desc' => '移动底盘和机械臂结合的智能机器人，能自主移动又能完成抓取、搬运、装配等作业。', 'tag' => '', 'series' => 'composite', 'family' => 'collaborative', 'image' => 'composite-robot.jpg'],
        ['name' => '视觉机器人', 'desc' => '配备机器视觉系统，能够识别目标，从而实现精准抓取、定位、检测和分拣等自动化作业。', 'tag' => '', 'series' => 'vision', 'family' => 'collaborative', 'image' => 'vision-robot.jpg'],
        ['name' => '机床', 'desc' => '对金属或其他材料进行切削、钻孔、铣削、磨削等加工，把原材料加工成精密零部件的工业设备。', 'tag' => '', 'series' => 'machine-tool', 'family' => 'collaborative', 'image' => 'machine-tool.jpg'],
        ['name' => '咖啡机', 'desc' => '自动制作咖啡，24 小时无人值守提供高品质咖啡。', 'tag' => '', 'series' => 'coffee', 'family' => 'collaborative', 'image' => 'coffee-machine.jpg'],
        ['name' => '清洁机器人', 'desc' => '替代人工、24 小时无人化、标准化完成工业清洁。', 'tag' => '', 'series' => 'cleaning', 'family' => 'collaborative', 'image' => 'cleaning-robot.jpg'],
        ['name' => '设备配件', 'desc' => '焊机、焊枪等保障焊接系统稳定、高效、连续运行的关键组成部分。', 'tag' => '', 'series' => 'accessories', 'family' => 'collaborative', 'image' => 'welding-gun.jpg'],
    ]);

    foreach ($cards as $idx => $card) {
        $cards[$idx]['image'] = !empty($card['image']) ? chenxuan_product_asset_url($card['image']) : '';
    }

    return $cards;
}

function chenxuan_case_items() {
    $make = function($slug, $title, $industry, $application, $zh, $en) {
        return compact('slug', 'title', 'industry', 'application', 'zh', 'en');
    };

    $cases = [
        $make('excavator-bucket-welding', '挖掘机铲斗焊接', '工程机械', '焊接', '在挖掘机制造中，铲斗是关键承载部件，其焊接质量直接影响产品耐用性。该工作站采用FANUC 六轴工业机器人，结合自动焊接夹具，实现对铲斗表面、加强筋及切割边缘的全自动精准焊接。机器人可以保持焊缝均匀、稳定，效率远高于人工操作，同时保证焊接质量一致性，显著降低人工成本和返工率。通过视频展示，客户可以看到机器人在高精度焊接中的灵活运动和焊缝效果。', 'In excavator manufacturing, the bucket is a key load-bearing component and weld quality directly affects durability. This workstation uses a FANUC six-axis industrial robot with automatic welding fixtures to precisely weld the bucket surface, reinforcement ribs and cut edges. The robot keeps weld seams uniform and stable, works far faster than manual operation, improves quality consistency and significantly reduces labor cost and rework.'),
        $make('loader-bucket-welding', '装载机铲斗焊接', '工程机械', '焊接', '装载机铲斗同样要求焊接高强度和耐用性。该工作站使用大型定位器和自动夹具，实现侧板、加强筋及切割边缘的全自动焊接。机器人在闭环控制下，能够自动适应工件尺寸变化，保证焊缝稳定且外观优良。系统可大幅减少人工干预，提升生产效率和焊接质量，同时降低因焊接不均或返工造成的损耗。', 'Loader buckets also require high weld strength and durability. The workstation uses large positioners and automatic fixtures to weld side plates, reinforcement ribs and cut edges. Under closed-loop control, the robot adapts to workpiece size changes, keeps weld seams stable and delivers a clean appearance. The system reduces manual intervention, improves efficiency and quality, and lowers losses caused by uneven welding or rework.'),
        $make('agricultural-frame-welding', '农机车架焊接', '工程机械', '焊接', '农业机械车架通常尺寸超大且重量较重，传统人工焊接效率低且易受精度限制。本工作站配备大尺寸定位台（8 m × 2 m，承重 2 吨）工业机器人，可稳定处理超长、重型零件，实现车架各关键焊接部位的高精度焊接。机器人与夹具协同作业，保证焊缝质量均匀且结构牢固，同时支持复杂焊接路径的自动规划，大幅提升生产效率和一致性，满足农业机械大批量制造需求', 'Agricultural machinery frames are usually oversized and heavy, while manual welding is inefficient and limited by accuracy. This workstation uses an industrial robot with an 8 m by 2 m positioning table rated for 2 tons, enabling stable handling of long and heavy parts and high-precision welding of key frame joints. Robot and fixture coordination keeps weld quality uniform and the structure strong, while automatic path planning supports complex seams and large-volume production.'),
        $make('vehicle-frame-welding', '车辆车架焊接', '工程机械', '焊接', '车辆车架焊接涉及纵梁和横梁的复杂结构，要求焊接精度高、效率快。该工作站采用单机双工位，配合自动夹具，实现高效率车架零件焊接。机器人协同工作，可同时焊接纵梁和横梁，保证焊缝均匀和结构牢固', 'Vehicle frame welding involves complex longitudinal and cross beam structures with high accuracy and efficiency requirements. The workstation uses a single robot with dual stations and automatic fixtures for efficient frame welding. Coordinated robotic work can weld longitudinal and cross beams while keeping seams uniform and the structure strong.'),
        $make('round-tube-flange-welding', '圆管法兰焊接', '工程机械', '焊接', '采用工业机器人实现圆管与法兰的全自动焊接，可保证焊缝均匀、强度高，适用于管道制造及机械设备连接件生产。机器人能够精准控制焊接角度和路径，提高焊接一致性，减少人工干预和返工。', 'Industrial robots automate welding between round tubes and flanges, producing uniform and high-strength seams for pipe manufacturing and mechanical connection parts. The robot precisely controls welding angle and path, improves consistency, and reduces manual intervention and rework.'),
        $make('rebar-welding', '钢筋焊接', '工程机械', '焊接', '针对建筑和基础设施行业，机器人可实现大批量钢筋笼或钢筋框架的自动焊接。系统支持高精度定位与焊接路径规划，保证结构稳定，显著提升生产效率和安全性。', 'For construction and infrastructure, robots can automatically weld rebar cages or frames in high volume. The system supports precise positioning and weld path planning, keeps structures stable, and significantly improves production efficiency and safety.'),
        $make('gas-liquid-separator-welding', '焊接气液分离器工作站', '工程机械', '焊接', '为化工或能源行业定制的焊接工作站，机器人可精确焊接气液分离器的各类管道与壳体部件，保证密封性和耐压性能。自动化焊接减少人工操作风险，并保持焊接质量稳定。', 'This custom welding workstation serves chemical and energy applications. Robots precisely weld pipes and shell components of gas-liquid separators to ensure sealing and pressure resistance. Automated welding reduces manual operation risk while keeping weld quality stable.'),
        $make('container-door-laser-tracking', '集装箱门板激光跟踪', '工程机械', '焊接', '利用激光跟踪系统结合机器人进行门板焊接和装配，可实现高精度焊接，保证集装箱门板尺寸精度和结构稳定。自动化系统提升焊接效率，并减少人工操作误差。', 'A laser tracking system is combined with robots for container door panel welding and assembly. It enables high-precision welding, maintains dimensional accuracy and structural stability, improves welding efficiency, and reduces manual error.'),
        $make('container-welding', '集装箱焊接', '工程机械', '焊接', '机器人可处理集装箱各部件的焊接，包括侧板、顶板和底板，实现全自动焊接流程。高精度焊接保证结构强度和尺寸一致性，适合大规模集装箱生产。', 'Robots can weld multiple container components including side panels, top panels and bottom panels through a fully automated process. High-precision welding ensures structural strength and dimensional consistency for large-scale container production.'),
        $make('idler-bracket-welding', '托辊支架焊接', '工程机械', '焊接', '用于输送设备的托辊支架焊接，机器人可实现多部位、重复性高的焊接任务。系统保证焊缝均匀、牢固，同时提高生产效率，减少人工焊接疲劳和误差。', 'For conveyor idler bracket welding, robots complete multi-position and highly repetitive welds. The system keeps seams uniform and strong, improves production efficiency, and reduces fatigue and errors from manual welding.'),
        $make('excavator-boom-welding', '挖掘机大臂焊接', '工程机械', '焊接', '针对挖掘机大臂这种超大零件，机器人结合大尺寸定位台实现高精度焊接。自动化焊接保证焊缝均匀稳定，提升产品可靠性，并大幅降低人工成本。', 'For oversized excavator booms, robots work with large positioning tables to achieve high-precision welding. Automated welding keeps seams uniform and stable, improves product reliability, and greatly lowers labor cost.'),
        $make('trailer-welding', '拖车焊接', '工程机械', '焊接', '机器人用于拖车框架及零部件焊接，可实现纵梁、横梁及关键支撑件的高效焊接。自动化系统保证焊接质量一致，提升生产效率和结构强度。', 'Robots weld trailer frames and components, including longitudinal beams, cross beams and key supports. The automated system keeps weld quality consistent while improving production efficiency and structural strength.'),
        $make('agricultural-frame-welding-repeat', '农机车架焊接', '工程机械', '焊接', '配备大尺寸定位器和工业机器人，可自动焊接农机车架各关键部位，保证焊缝均匀、结构牢固。机器人系统提高焊接效率，适应超大、超重零件的生产需求。', 'Equipped with a large positioner and industrial robot, the system automatically welds key parts of agricultural machinery frames. Robotic welding keeps seams uniform and structures strong, improves welding efficiency, and supports production of oversized and heavy parts.'),
        $make('bucket-welding', '铲斗焊接', '工程机械', '焊接', '机器人用于装载机或挖掘机铲斗焊接，覆盖加强筋、侧板及边缘等部位。全自动焊接保证焊缝均匀、强度高，显著提高生产效率和产品可靠性。', 'Robots weld loader or excavator buckets across reinforcement ribs, side plates and edges. Fully automated welding keeps seams uniform and strong, significantly improving efficiency and product reliability.'),
        $make('frame-welding', '车架焊接', '工程机械', '焊接', '用于汽车及工程机械车架焊接，机器人可同时焊接纵梁和横梁，保证焊接精度和一致性。系统自动规划焊接路径，实现高效、稳定的车架生产。', 'For automotive and construction machinery frames, robots can weld longitudinal and cross beams while maintaining accuracy and consistency. Automatic weld path planning enables efficient and stable frame production.'),
        $make('bumper-spraying', '保险杠喷涂工作站', '汽车及零部件', '喷涂', '该工作站搭载工业喷涂机器人，实现汽车保险杠的高精度、均匀喷涂。机器人可自动规划喷涂路径，覆盖复杂曲面区域，保证涂层厚度一致，满足严格的汽车涂装标准。全自动喷涂不仅提高生产效率，还确保涂装质量稳定，适合大批量工业化加工。', 'This workstation uses an industrial spraying robot for high-precision and uniform bumper coating. The robot automatically plans spray paths over complex curved surfaces, keeps coating thickness consistent, and meets strict automotive painting standards. Fully automated spraying improves efficiency and stabilizes coating quality for mass production.'),
        $make('axle-welding', '车桥焊接工作站', '汽车及零部件', '焊接', '本工作站专为车桥壳体及复杂构件设计，配备工业机器人与专用工装夹具，实现全自动焊接。机器人可精准覆盖车桥各焊接节点，保证焊缝深度均匀、成型一致。系统提升焊接质量与可靠性，同时大幅降低人工操作风险和生产周期。', 'This workstation is designed for axle housings and complex components. Industrial robots and dedicated fixtures enable fully automated welding, precisely cover each axle welding node, and keep penetration depth and seam formation consistent. The system improves quality and reliability while reducing manual risk and cycle time.'),
        $make('body-cutting', '车身切割工作站', '汽车及零部件', '切割', '车身切割工作站采用倒挂式工业机器人结合龙门结构，可灵活覆盖车身各切割面，实现高精度切割。系统适用于不同车型的车身大批量加工，保证切割尺寸精确、一致性高，同时提升生产效率和安全性。', 'The body cutting workstation combines an inverted industrial robot with a gantry structure to cover multiple cutting surfaces flexibly and accurately. It supports high-volume processing for different vehicle bodies, keeps cutting dimensions precise and consistent, and improves efficiency and safety.'),
        $make('engine-block-spraying', '发动机缸体喷涂工作站', '汽车及零部件', '喷涂', '该工作站配备协作机器人与输送线，用于发动机缸体的高精度喷涂。机器人可精确控制喷涂厚度，保证涂层均匀覆盖每个表面，提升密封性和耐用性。全自动喷涂适合大批量生产，提高工艺稳定性和生产效率。', 'This workstation uses a collaborative robot and conveyor line for high-precision engine block spraying. The robot precisely controls coating thickness, ensures uniform surface coverage, and improves sealing and durability. Fully automated spraying suits mass production and improves process stability and efficiency.'),
        $make('sealant-dispensing', '密封涂胶', '汽车及零部件', '点胶', '汽车密封涂胶工作站配备工业机器人，实现车身密封胶的高精度喷涂适用于各类汽车车身密封胶的批量化工业加工。', 'The automotive sealant workstation uses an industrial robot for high-precision body sealant application. It supports batch industrial processing for multiple vehicle body sealant scenarios.'),
        $make('automotive-welding-assembly', '汽车焊装', '汽车及零部件', '焊接', '该工作站采用工业机器人与多轴变位机相结合，实现汽车车架各焊接节点的高精度自动焊接。机器人可同时处理纵梁、横梁及关键结构件，保证焊缝均匀、强度高且结构牢固。系统支持大批量工业化生产，并可根据不同车型调整焊接程序，满足严格的强度、安全及一致性标准。多轴变位机确保超大零件在焊接过程中稳定定位，提升焊接质量，同时减少人工操作风险和返工率，实现高效、稳定的车架制造。', 'This workstation combines industrial robots with multi-axis positioners for high-precision automatic welding of automotive frame nodes. Robots handle longitudinal beams, cross beams and key structural parts, keeping seams uniform, strong and structurally reliable. The system supports mass production and can adjust programs for different models, meeting strict strength, safety and consistency standards. Multi-axis positioners stabilize oversized parts during welding, improve quality, and reduce manual risk and rework.'),
        $make('sheet-metal-gluing', '汽车钣金涂胶', '汽车及零部件', '点胶', '该工作站专为汽车钣金零件设计，实现机器人自动化涂胶作业。系统配备专用工装夹具，确保零件在喷涂过程中稳定固定，同时自动规划涂胶路径，实现涂胶的均匀覆盖和精准控制。机器人可处理复杂形状的钣金件，保证密封胶厚度一致，减少人工误差，提高产品密封性能和可靠性。全自动涂胶不仅显著提升生产效率，还降低了人工劳动强度，适合大批量汽车零件加工与生产线应用。', 'This workstation is designed for automotive sheet metal parts and automates sealant application with robots. Dedicated fixtures hold parts steadily while the system plans dispensing paths for uniform coverage and precise control. Robots handle complex sheet metal shapes, keep sealant thickness consistent, reduce manual error, and improve sealing reliability. Full automation increases efficiency and reduces labor intensity for mass automotive parts production.'),
        $make('auto-frame-workstation', '汽车车架焊接工作站', '汽车及零部件', '焊接', '该工作站采用工业机器人与多轴变位机协同作业，实现汽车车架各焊接节点的高精度、全自动焊接。系统能够处理纵梁、横梁及关键结构件，保证焊缝均匀、强度高且结构牢固。配合可调节夹具和智能焊接路径规划，能够适应不同车型和车架尺寸，实现大批量工业化生产。自动化焊接不仅提升了生产效率和一致性，还大幅降低人工操作风险和返工率，满足汽车制造业对于强度、安全性和可靠性的严格标准。', 'Industrial robots and multi-axis positioners work together for high-precision, fully automated automotive frame welding. The system handles longitudinal beams, cross beams and key structures with uniform, strong seams. Adjustable fixtures and intelligent path planning adapt to different models and frame sizes for mass production. Automated welding improves efficiency and consistency, reduces manual risk and rework, and meets strict automotive strength, safety and reliability standards.'),
        $make('shock-absorber-picking', '吸震器取料工作站', '汽车及零部件', '搬运', '该工作站配备工业机器人，可实现吸震器的高效抓取与搬运。机器人系统能够精准识别不同型号的吸震器，并通过专用夹具稳定抓取，适应各种尺寸和重量变化。全自动搬运与上下料作业不仅提升生产效率，还减少人工操作风险，适用于大批量工业化生产场景。', 'This workstation uses industrial robots for efficient shock absorber picking and handling. The system accurately identifies different shock absorber models and uses dedicated grippers for stable handling across size and weight variations. Fully automated handling and loading improve efficiency and reduce manual risk in mass production.'),
        $make('brake-drum-line', '制动鼓生产线', '汽车及零部件', '搬运', '制动鼓生产线集成自动化搬运、焊接、加工及检测设备，实现制动鼓的高效批量化生产。机器人可精确定位零件，自动完成焊接及加工操作，并结合在线检测系统保证每个制动鼓符合质量标准。该系统适用于汽车及商用车制动鼓的大规模工业化加工，提高生产效率和一致性。', 'The brake drum production line integrates automated handling, welding, machining and inspection equipment for efficient batch production. Robots precisely position parts, complete welding and machining, and work with online inspection to ensure each brake drum meets quality standards. The system suits large-scale processing for passenger and commercial vehicle brake drums.'),
        $make('dashboard-welding', '汽车仪表盘焊接工作站', '汽车及零部件', '焊接', '专用于汽车仪表盘焊接，采用高精度工业机器人进行自动化焊接作业。通过专用定位夹具，确保复杂结构零件的稳定夹持，实现焊缝一致、外观美观、强度可靠。自动化焊接提升生产效率，同时降低人工操作风险和返工率。', 'Designed for automotive dashboard welding, this workstation uses high-precision industrial robots and dedicated positioning fixtures. Complex parts are held steadily, producing consistent seams, clean appearance and reliable strength. Automated welding improves efficiency while reducing manual risk and rework.'),
        $make('steering-wheel-welding', '方向盘焊接工作站', '汽车及零部件', '焊接', '本工作站针对方向盘焊接需求，采用工业机器人配合单轴头尾式翻转变位机，实现焊接位置的灵活翻转与精准匹配。定制夹具保证复杂结构的稳定夹持和高精度焊接，适合大批量生产，确保焊缝强度和外观一致性。', 'For steering wheel welding, this workstation uses an industrial robot with a single-axis head-tail turnover positioner to flexibly rotate and match welding positions. Custom fixtures hold complex structures steadily and support high-precision welding for mass production, ensuring seam strength and appearance consistency.'),
        $make('resistance-welding', '汽车配件电阻焊工作站', '汽车及零部件', '焊接', '该工站用于汽车零部件的电阻焊接，机器人结合电阻焊钳实现稳定加压与精准导电。系统保证加热均匀、焊点一致，提升零部件强度和可靠性。自动化操作减少人工操作风险，适合高效率、大批量工业化生产。', 'This workstation is used for resistance welding of automotive parts. Robots with resistance welding guns provide stable pressure and accurate conductivity, ensuring even heating and consistent weld spots. Automation improves part strength and reliability while reducing manual risk for high-volume production.'),
        $make('agv-aluminum-loading', 'AGV铝管加工上下料', '金属加工', '上下料', '本工作站通过AGV自动搬运系统实现铝管加工工序的全自动上下料。AGV与加工设备无缝对接，能够精准定位并稳定输送物料，实现连续、高效的生产周转。适用于铝制零部件的柔性化生产，可根据不同加工工序自动调整路径和位置，显著提升生产效率并降低人工操作成本。', 'This workstation uses an AGV handling system for fully automatic loading and unloading of aluminum tube processing. AGVs connect seamlessly with machining equipment, position materials accurately and transport them steadily for continuous production flow. The solution suits flexible aluminum parts production, adjusts routes and positions by process, improves efficiency and lowers labor cost.'),
        $make('marine-shaft-cladding', '船用轴激光熔覆工作站', '金属加工', '打磨', '该工站用于船用轴表面耐磨层加工，采用高精度激光熔覆技术结合自动夹具，实现均匀沉积。机器人可自动控制激光功率与移动路径，保证熔覆层厚度均匀、结合牢固，提升轴的耐磨性和使用寿命。支持批量化、高精度生产，适用于船舶及大型机械零件加工。', 'This workstation processes wear-resistant layers on marine shaft surfaces using high-precision laser cladding with automatic fixtures. Robots control laser power and motion paths to keep cladding thickness uniform and bonding strong, improving wear resistance and service life. It supports high-precision batch production for ships and large machinery parts.'),
        $make('led-powder-spraying', 'LED灯配件挂线喷粉工作站', '金属加工', '喷涂', '本工作站专为LED灯配件设计，采用自动挂线输送与机器人喷粉作业，实现涂层均匀覆盖。机器人可精准控制喷粉角度和厚度，保证焊点和外观一致，提高产品美观度和可靠性。全自动流程显著提升生产效率，减少人工操作，适合大批量工业化加工。', 'Designed for LED lighting accessories, this workstation combines automatic hanging conveyors with robotic powder spraying for uniform coating coverage. Robots precisely control spray angle and thickness, keeping weld points and appearance consistent. The fully automated process improves efficiency, reduces manual work and supports mass production.'),
        $make('cabinet-welding', '电柜箱体焊接工作站', '金属加工', '焊接', '该工站采用倒挂悬臂式工业机器人进行电柜箱体焊接，结合精密表面控制工艺，实现焊缝均匀、表面平整。系统可自动调整焊接路径和速度，保证强度与美观并重，同时提升生产效率和技术含量。适合工业电柜及控制箱的大规模自动化生产，减少人工操作风险。', 'This workstation uses an inverted cantilever industrial robot for electrical cabinet welding. With precise surface control, it produces uniform seams and flat surfaces. The system automatically adjusts welding path and speed to balance strength and appearance, improves efficiency and technical capability, and suits large-scale production of industrial cabinets and control boxes.'),
        $make('explosion-proof-loading', '防爆箱上下料工作站', '金属加工', '上下料', '本工站专用于防爆箱的自动上下料作业，配备机器人、磁吸装置与3D相机。系统能够自动识别待抓取工件的位置和姿态，实现精准抓取与装配。全自动搬运不仅保证操作安全，提升生产效率，同时确保工件在搬运和装配过程中的稳定性和精度，适合防爆设备及相关安全标准要求高的生产环境。', 'This workstation is dedicated to automatic loading and unloading of explosion-proof boxes. It uses robots, magnetic grippers and 3D cameras to identify workpiece position and posture for accurate picking and assembly. Fully automated handling improves safety and efficiency while maintaining stability and precision for high-safety production environments.'),
        $make('aluminum-trolley-welding', '滑板小车铝合金焊接工作站', '金属加工', '焊接', '该工作站采用工业机器人配合专用夹具对滑板小车铝合金结构进行自动焊接。机器人可实现焊缝均匀、尺寸精确，焊接强度可靠。全自动焊接流程显著提升生产效率，同时确保每件产品的一致性和加工精度，适合大批量工业化生产。', 'This workstation uses industrial robots and dedicated fixtures to weld aluminum alloy trolley structures. Robots deliver uniform seams, accurate dimensions and reliable weld strength. The fully automated process improves efficiency and ensures product consistency and machining accuracy for mass production.'),
        $make('laser-tube-cutting', '激光切管机工作站', '金属加工', '切割', '本设备结合三维激光切割技术、倒挂式机器人与龙门结构，实现管件的高精度切割及复杂形状加工。机器人可精确控制切割路径和速度，保证切割质量均匀一致，同时提升生产效率。该系统适合铝管、钢管及复杂形状管件的大规模自动化加工。', 'This equipment combines 3D laser cutting, an inverted robot and a gantry structure to cut tubes with high precision and process complex shapes. Robots control cutting paths and speed accurately, ensuring consistent quality and higher efficiency. The system suits large-scale automated processing of aluminum tubes, steel tubes and complex tube parts.'),
        $make('robot-bending-stamping', '机器人折弯与冲压工作站', '金属加工', '折弯', '该工站采用ABB工业机器人生产线对家电内胆进行自动折弯、冲压及搬运。机器人可实现焊缝均匀、折弯精度高、强度可靠。自动化系统提升生产效率，保证产品一致性，减少人工操作风险，并适应大批量家电内胆工业化生产需求。', 'This workstation uses an ABB industrial robot line for automatic bending, stamping and handling of appliance inner liners. Robots support high bending accuracy and reliable strength while the automation system improves efficiency, ensures product consistency, reduces manual risk and suits mass production of appliance components.'),
        $make('fitness-equipment-processing', '健身器材加工工作站', '金属加工', '冲压', '本工作站由工业机器人、专用抓具及重力堆垛平台组成，实现板件的自动抓取、折弯和冲压加工。机器人可精准定位工件，并高效协同设备完成多工序作业，保证加工精度和产品一致性。自动化流程提升生产效率，减少人工操作干预，适合大批量健身器材生产。', 'This workstation combines industrial robots, dedicated grippers and a gravity stacking platform for automatic picking, bending and stamping of sheet parts. Robots position workpieces accurately and coordinate multiple processes efficiently, keeping machining accuracy and product consistency. The automated flow improves efficiency and reduces manual intervention for fitness equipment production.'),
        $make('distribution-box-laser-welding', '配电箱激光焊工作站', '金属加工', '焊接', '该工站采用工业机器人配合三轴垂直变位机对配电箱进行激光焊接。系统可精确控制焊缝位置和尺寸，实现焊缝均匀、强度可靠。机器人自动化焊接提高生产效率，保证配电箱焊接质量一致性，同时适应不同规格型号的工业生产需求。', 'This workstation uses industrial robots and a three-axis vertical positioner for laser welding of distribution boxes. The system precisely controls weld position and size for uniform and reliable seams. Robotic welding improves efficiency, ensures consistent quality and adapts to industrial production of different box specifications.'),
        $make('rigging-loading', '索具机上下料工作站', '金属加工', '上下料', '本工站采用链条式单层上料输送线，在人工每60分钟定时补料的情况下，可实现设备连续不停机运行。料盘具备防错设计，辅助人工快速、准确放料。工业机器人可精准抓取和搬运材料，提高上下料效率，保证生产线连续性与安全性。', 'This workstation uses a chain-type single-layer feeding conveyor. With manual replenishment every 60 minutes, the equipment can run continuously without stopping. Error-proof trays help operators load materials quickly and accurately, while robots pick and move materials precisely to improve loading efficiency and production line safety.'),
        $make('special-tube-winding', '异型管件缠绕工作站', '金属加工', '雕刻', '该工作站采用工业机器人实现精确轨迹控制，可对复杂弯曲的异型管件进行均匀、稳定的缠绕加工。系统适配多种管件形状，保证高一致性成型，同时实现高效自动化生产，提升产能和产品质量。', 'This workstation uses industrial robots for precise trajectory control and uniform winding of complex curved special-shaped tubes. The system adapts to multiple tube shapes, keeps forming consistency high, and enables efficient automated production with better capacity and quality.'),
        $make('h-beam-arch-welding', 'H型钢拱架焊接工作站', '船舶和钢结构行业', '焊接', '本工站采用免示教焊接机器人，能够自动识别H型钢拱架的焊缝并完成全流程焊接。适用于长结构件的高效焊接，机器人能够保持焊缝均匀、成型稳定，提高生产一致性和焊接效率，同时显著降低人工操作风险。', 'This workstation uses a teach-free welding robot that automatically identifies H-beam arch weld seams and completes the full welding process. It is suitable for efficient welding of long structural parts, keeping seams uniform and stable, improving consistency and efficiency, and significantly reducing manual risk.'),
        $make('steel-structure-welding', '钢结构焊接工作站', '船舶和钢结构行业', '焊接', '该工站采用机器人悬臂倒挂设计，操作灵活、焊接范围广，可高效处理大型钢结构件。机器人能够精准控制焊接路径和速度，保证焊缝质量一致，满足大型建筑或工业钢结构焊接的高标准要求，同时提升生产效率。', 'This workstation uses an inverted robot cantilever design for flexible operation and wide welding coverage. It efficiently handles large steel structures, precisely controls welding path and speed, keeps seam quality consistent, meets high standards for large building or industrial steel structures, and improves efficiency.'),
        $make('cobot-steel-welding', '协作钢结构焊接工作站', '船舶和钢结构行业', '焊接', '本工站使用协作机器人（Cobot），操作灵活、移动便捷。通过拖动示教即可完成焊接，无需复杂编程，提高使用效率。适用于中小型钢结构件的焊接，既提升生产效率，又降低人工操作门槛。', 'This workstation uses a collaborative robot for flexible operation and easy movement. Operators can complete welding through drag teaching without complex programming, improving usability. It is suitable for small and medium steel structures, increasing production efficiency and lowering the operation threshold.'),
        $make('hull-welding', '船体焊接工作站', '船舶和钢结构行业', '焊接', '该工站采用悬臂倒挂机器人结合免示教焊接系统和逆向建模技术，实现船体结构的高效、精确自动化焊接。机器人可覆盖船体各复杂焊接节点，保证焊缝均匀、结构牢固，同时显著提升焊接效率和生产一致性，适用于船舶制造大规模工业化生产。', 'This workstation combines an inverted cantilever robot, teach-free welding and reverse modeling technology for efficient and precise automated hull welding. Robots cover complex hull welding nodes, keep seams uniform and structures strong, and significantly improve welding efficiency and production consistency for large-scale shipbuilding.'),
        $make('putty-powder-cleaning', '清洗腻子粉', '环保清洁行业', '清洁', '该工作站面向粉尘、腻子粉及生产现场清洁场景，通过自动化清洗设备与机器人执行机构协同，实现地面、设备表面及作业区域的高效清理。系统可根据现场环境调整清洗路径和作业强度，减少人工清洁强度，提升车间环境稳定性与生产安全性。', 'This workstation is built for dust, putty powder and industrial cleaning scenarios. Automated cleaning equipment works with robotic actuators to clean floors, equipment surfaces and work areas efficiently. The system adjusts routes and intensity by site conditions, reduces manual cleaning workload, and improves workshop hygiene and production safety.'),
        $make('industrial-cleaning-robot', '工业清洁机器人', '环保清洁行业', '清洁', '该机器人专为工业环境设计，实现地面、设备及生产区域的全自动清洁。配备高精度传感器与路径规划系统，能够自主识别障碍物、规划最优清洁路线，并根据不同地面材质调整清洁模式。机器人具备高效吸尘、拖地及喷洒功能，可连续工作长时间，显著降低人工清洁成本，提高厂区卫生水平和生产安全性，适用于工厂车间、仓储及大型生产线环境。', 'This robot is designed for industrial environments and automatically cleans floors, equipment and production areas. High-precision sensors and path planning allow it to detect obstacles, plan efficient routes and adjust cleaning modes by floor material. With vacuuming, mopping and spraying functions, it can work continuously, reduce cleaning cost, and improve plant hygiene and production safety.'),
        $make('coffee-robot', '咖啡机器人', '服务行业', '搬运', '咖啡机器人用于咖啡制备及配送自动化，配备智能视觉识别与精密操作系统，可自动识别咖啡原料、控制研磨、萃取和拉花等流程。机器人可实现标准化操作，保证每杯咖啡口感一致，同时支持多种饮品定制。全自动化操作不仅提高服务效率，减少人为失误，还可在咖啡店、餐饮连锁或办公室环境中实现高效生产和智能化管理。', 'The coffee robot automates coffee preparation and delivery. Intelligent vision recognition and precision operation systems identify ingredients and control grinding, extraction and latte art. Standardized operation keeps taste consistent while supporting multiple drink options. Full automation improves service efficiency, reduces human error, and supports smart production and management in coffee shops, restaurant chains and offices.'),
        $make('humanoid-workstation', '人形机器人工作站', '智能制造', '搬运', '本工作站采用先进的人形机器人系统，可模拟人工动作执行各类作业任务，如焊接、搬运、装配及打磨等。机器人具备灵活关节与高精度传感器，能够适应复杂、狭小或不规则工件，实现多工序协同作业。', 'This workstation uses an advanced humanoid robot system that simulates human motions to perform tasks such as welding, handling, assembly and grinding. Flexible joints and high-precision sensors allow it to adapt to complex, narrow or irregular workpieces and complete coordinated multi-process operations.'),
    ];

    $lang = chenxuan_current_lang_code();
    $use_zh = in_array($lang, ['zh', 'zh_tw'], true);
    $localized = [];

    $media_map = function_exists('chenxuan_case_media_map') ? chenxuan_case_media_map() : [];

    foreach ($cases as $case) {
        $body = $use_zh ? $case['zh'] : chenxuan_translate_from_english($case['en'], $lang, $case['title'] . ' ' . $case['application']);
        if ($lang === 'zh_tw') {
            $body = chenxuan_to_traditional($body);
        }
        $media = isset($media_map[$case['slug']]) ? chenxuan_resolve_media($media_map[$case['slug']]) : chenxuan_resolve_media([]);

        $localized[] = [
            'slug' => $case['slug'],
            'title' => chenxuan_l($case['title']),
            'industry' => chenxuan_l($case['industry']),
            'application' => chenxuan_l($case['application']),
            'desc' => $body,
            'body' => [$body],
            'media' => $media,
        ];
    }

    return $localized;
}

function chenxuan_media_url($relative_path) {
    $relative_path = ltrim((string) $relative_path, '/');
    if ($relative_path === '') {
        return '';
    }

    return content_url('uploads/chenxuan/' . $relative_path);
}

function chenxuan_media_exists($relative_path) {
    $relative_path = ltrim((string) $relative_path, '/');
    if ($relative_path === '') {
        return false;
    }

    return file_exists(WP_CONTENT_DIR . '/uploads/chenxuan/' . $relative_path);
}

function chenxuan_resolve_media($media) {
    $poster = isset($media['poster']) && chenxuan_media_exists($media['poster']) ? chenxuan_media_url($media['poster']) : '';
    $video = isset($media['video']) && chenxuan_media_exists($media['video']) ? chenxuan_media_url($media['video']) : '';

    return [
        'poster' => $poster,
        'video' => $video,
        'status' => $video ? 'video' : ($poster ? 'poster' : 'missing'),
    ];
}

function chenxuan_case_media_map() {
    $with_video = function($slug) {
        return [
            'poster' => 'solution-cases/' . $slug . '/poster.jpg',
            'video' => 'solution-cases/' . $slug . '/video.mp4',
        ];
    };
    $poster_only = function($slug) {
        return [
            'poster' => 'solution-cases/' . $slug . '/poster.jpg',
        ];
    };

    return [
        'excavator-bucket-welding' => $with_video('excavator-bucket-welding'),
        'loader-bucket-welding' => $with_video('loader-bucket-welding'),
        'agricultural-frame-welding' => $with_video('agricultural-frame-welding'),
        'vehicle-frame-welding' => $with_video('vehicle-frame-welding'),
        'round-tube-flange-welding' => $with_video('round-tube-flange-welding'),
        'rebar-welding' => $with_video('rebar-welding'),
        'gas-liquid-separator-welding' => $with_video('gas-liquid-separator-welding'),
        'container-door-laser-tracking' => $with_video('container-door-laser-tracking'),
        'container-welding' => $with_video('container-welding'),
        'idler-bracket-welding' => $with_video('idler-bracket-welding'),
        'excavator-boom-welding' => $with_video('excavator-boom-welding'),
        'trailer-welding' => $poster_only('trailer-welding'),
        'agricultural-frame-welding-repeat' => $with_video('agricultural-frame-welding-repeat'),
        'bucket-welding' => $with_video('bucket-welding'),
        'frame-welding' => $with_video('frame-welding'),
        'bumper-spraying' => $with_video('bumper-spraying'),
        'axle-welding' => $with_video('axle-welding'),
        'body-cutting' => $with_video('body-cutting'),
        'engine-block-spraying' => $with_video('engine-block-spraying'),
        'sealant-dispensing' => $with_video('sealant-dispensing'),
        'automotive-welding-assembly' => $with_video('automotive-welding-assembly'),
        'sheet-metal-gluing' => $with_video('sheet-metal-gluing'),
        'auto-frame-workstation' => $with_video('auto-frame-workstation'),
        'shock-absorber-picking' => $with_video('shock-absorber-picking'),
        'brake-drum-line' => $with_video('brake-drum-line'),
        'dashboard-welding' => $poster_only('dashboard-welding'),
        'steering-wheel-welding' => $poster_only('steering-wheel-welding'),
        'resistance-welding' => $poster_only('resistance-welding'),
        'agv-aluminum-loading' => $with_video('agv-aluminum-loading'),
        'marine-shaft-cladding' => $with_video('marine-shaft-cladding'),
        'led-powder-spraying' => $with_video('led-powder-spraying'),
        'cabinet-welding' => $with_video('cabinet-welding'),
        'explosion-proof-loading' => $with_video('explosion-proof-loading'),
        'aluminum-trolley-welding' => $with_video('aluminum-trolley-welding'),
        'laser-tube-cutting' => $with_video('laser-tube-cutting'),
        'robot-bending-stamping' => $with_video('robot-bending-stamping'),
        'fitness-equipment-processing' => $with_video('fitness-equipment-processing'),
        'distribution-box-laser-welding' => $with_video('distribution-box-laser-welding'),
        'rigging-loading' => $with_video('rigging-loading'),
        'special-tube-winding' => $with_video('special-tube-winding'),
        'h-beam-arch-welding' => $with_video('h-beam-arch-welding'),
        'steel-structure-welding' => $with_video('steel-structure-welding'),
        'cobot-steel-welding' => $with_video('cobot-steel-welding'),
        'hull-welding' => $with_video('hull-welding'),
        'putty-powder-cleaning' => $with_video('putty-powder-cleaning'),
        'industrial-cleaning-robot' => $with_video('industrial-cleaning-robot'),
    ];
}

function chenxuan_solution_media_map() {
    $home_media = function($path) {
        return [
            'poster' => chenxuan_home_asset_url($path),
            'video' => '',
            'status' => 'poster',
        ];
    };
    $case_media = function($path) {
        return chenxuan_resolve_media([
            'poster' => $path,
        ]);
    };

    return [
        'engineering-machinery' => $home_media('fit/industries/engineering-machinery.jpg'),
        'automotive-parts' => $home_media('fit/industries/automotive-parts.jpg'),
        'metal-fabrication' => $home_media('fit/industries/metal-fabrication.jpg'),
        'ship-steel-structure' => $case_media('solution-cases/h-beam-arch-welding/poster.jpg'),
        'environmental-cleaning' => $case_media('solution-cases/industrial-cleaning-robot/poster.jpg'),
    ];
}

function chenxuan_workstation_media_map() {
    $map = [
        'welding' => ['poster' => 'solution-cases/excavator-bucket-welding/poster.jpg'],
        'surface' => ['poster' => 'solution-cases/bumper-spraying/poster.jpg'],
        'handling' => ['poster' => 'solution-cases/agv-aluminum-loading/poster.jpg'],
        'loading' => ['poster' => 'solution-cases/explosion-proof-loading/poster.jpg'],
    ];

    foreach ($map as $slug => $media) {
        $map[$slug] = chenxuan_resolve_media($media);
    }

    return $map;
}

function chenxuan_news_items() {
    $items = chenxuan_localize_array([
        ['title' => '辰轩遥操作智能喷涂机器人', 'excerpt' => '突破传统喷涂限制，实现“人机协同、远程操控、精准喷涂”。让复杂曲面喷涂更安全、更高效、更智能。', 'date' => '2026.05.23', 'category' => '项目洞察', 'filter' => 'project', 'url' => home_url('/news')],
        ['title' => '智造未来 · 驱动无限可能', 'excerpt' => '6月17-20日，辰轩机器人将亮相泰国工业展（Booth No. 8C05），携智能焊接机器人、人形机器人、视觉引导系统及自动化解决方案精彩登场。', 'date' => '2026.05.23', 'category' => '展会动态', 'filter' => 'solution', 'url' => 'https://www.facebook.com/share/18cUGfKisU/'],
        ['title' => 'AGV搬运系统助力厂内物流无人化', 'excerpt' => '通过自动化物料搬运、仓储配送和生产物流协同，提升制造现场流转效率。', 'date' => '2026.05.23', 'category' => '行业场景', 'filter' => 'industry'],
        ['title' => '智慧商业场景中的机器人工作站应用', 'excerpt' => '机器人咖啡、智能饮品、无人零售和智慧餐饮正在打开更灵活的服务体验。', 'date' => '2026.05.23', 'category' => '智慧商业', 'filter' => 'commerce'],
        ['title' => '工业机器人与协作机器人的场景分工', 'excerpt' => '高负载、高速度、高精度与安全协作、灵活部署共同构成辰轩的产品组合。', 'date' => '2026.05.23', 'category' => '产品观察', 'filter' => 'solution'],
    ]);

    $images = [
        chenxuan_home_asset_url('fit/news/painting-solution.png'),
        chenxuan_home_asset_url('fit/news/news-02.jpg'),
        chenxuan_home_asset_url('fit/industries/agv-logistics.jpg'),
        chenxuan_home_asset_url('fit/industries/smart-commerce.jpg'),
        chenxuan_home_asset_url('fit/family/collaborative-robot.jpg'),
    ];

    foreach ($items as $idx => $item) {
        $items[$idx]['image'] = $images[$idx] ?? '';
    }

    return $items;
}

function chenxuan_social_links() {
    return [
        ['key' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/share/18cUGfKisU/?mibextid=wwXIfr', 'short' => 'Fb', 'color' => '#1877f2', 'icon' => trailingslashit(JAKA_URI) . 'assets/icons/social/facebook.png?v=' . JAKA_VERSION],
        ['key' => 'tiktok', 'label' => 'TikTok', 'url' => 'https://www.tiktok.com/@yanmei.bo?_r=1&_t=ZS-96B7evjXCZs', 'short' => 'Tk', 'color' => '#111111', 'icon' => trailingslashit(JAKA_URI) . 'assets/icons/social/tiktok.png?v=' . JAKA_VERSION],
        ['key' => 'youtube', 'label' => 'YouTube', 'url' => 'https://youtube.com/@yanmeibo?si=LkHvgrYu5f6NJQNs', 'short' => 'Yt', 'color' => '#ff0000', 'icon' => trailingslashit(JAKA_URI) . 'assets/icons/social/youtube.png?v=' . JAKA_VERSION],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://www.instagram.com/yanmeibo127?igsh=am16bGl2NWR0azJ1&utm_source=qr', 'short' => 'Ig', 'color' => '#e4405f', 'icon' => trailingslashit(JAKA_URI) . 'assets/icons/social/instagram.png?v=' . JAKA_VERSION],
        ['key' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/yanmei-bo-704577390', 'short' => 'In', 'color' => '#0a66c2', 'icon' => trailingslashit(JAKA_URI) . 'assets/icons/social/linkedin.png?v=' . JAKA_VERSION],
    ];
}

function chenxuan_i18n_override($key, $lang = 'zh') {
    $zh = [
        'nav_products' => '工业机器人',
        'nav_cobots' => '协作机器人',
        'nav_solutions' => '解决方案',
        'nav_cases' => '案例中心',
        'nav_service' => '服务与支持',
        'nav_download' => '下载中心',
        'nav_news' => '新闻',
        'nav_about' => '关于辰轩',
        'btn_consult' => '在线咨询',
        'btn_login' => '登录',
        'btn_register' => '注册',
        'btn_logout' => '退出',
        'btn_search' => '搜索',
        'learn_more' => '了解更多',
        'explore_more' => '探索更多',
        'view_all' => '查看全部',
        'btn_read_more' => '阅读全文',
        'btn_load_more' => '加载更多',
        'btn_view_detail' => '查看详情',
        'mega_about_tagline' => '定制化工业机器人自动化系统集成方案',
        'mega_contact' => '联系我们',
        'footer_copyright' => '版权所有 辰轩机器人',
        'ftr_desc' => '专注定制化工业机器人自动化系统集成，帮助制造企业提升效率、稳定质量并降低人工依赖。',
        'privacy_policy' => '隐私政策',
        'user_agreement' => '用户协议',
        'personal_info' => '个人信息保护',
        'cookie_policy' => 'Cookie 政策',
        'legal_privacy_body' => '我们仅收集用于项目沟通所必需的信息，包括姓名、公司、联系电话、邮箱和自动化需求描述。相关信息仅用于辰轩项目咨询、方案评估、交付沟通及必要的客户服务。',
        'legal_user_body' => '访问和使用辰轩官网即表示您理解本站内容用于展示辰轩机器人自动化系统集成能力。具体项目范围、交付内容和商务条款以双方正式合同或书面确认为准。',
        'legal_personal_body' => '辰轩将按照合法、正当、必要原则处理个人信息。您可以通过联系表单提交更正、删除或停止使用相关信息的请求，我们将在合理期限内处理。',
        'legal_cookie_body' => '本站使用 Cookie 记录基础浏览偏好并改善访问体验。您可以通过浏览器设置管理或删除 Cookie，但部分交互体验可能受到影响。',
        'legal_contact_note' => '如需进一步了解信息处理方式或提交相关请求，请通过联系辰轩页面与我们沟通。',
        'cookie_text' => '我们使用 Cookie 改善浏览体验。继续使用本站即表示您同意我们的',
        'cookie_accept' => '接受',
        'cookie_decline' => '拒绝',
        'back_to_top' => '返回顶部',
        'sidebar_consult' => '在线咨询',
        'sidebar_sample' => '预约沟通',
        'search_placeholder' => '输入行业、工艺或自动化需求',
        'search_no_results' => '暂无搜索结果',
        'search_found_tip' => '为您找到 %s 个与 "%s" 相关的搜索结果',
        'search_tab_download' => '资料中心',
        'search_tab_faq' => '常见问题',
        'search_tab_product' => '产品中心',
        'search_tab_solution' => '解决方案',
        'search_tab_news' => '新闻',
        'hero_explore' => '探索产品',
        'hero_solutions' => '解决方案',
        'section_products' => '产品中心',
        'section_solutions' => '基于行业经验的智能场景解决方案',
        'section_service' => '自动化集成解决方案服务体系',
        'section_news' => '智汇自动化 · 洞见智造未来',
        'products_desc' => '围绕工业机器人与协作机器人，交付匹配工艺现场的自动化系统。',
        'solutions_desc' => '覆盖工程机械、汽车零部件、金属加工、食品包装、重型装备、AGV搬运与智慧商业场景。',
        'service_desc' => '以客户为中心的全流程工程服务。',
        'news_desc' => '辰轩与您分享每一个智能制造升级瞬间。',
        'news_read' => '立即了解',
        'news_explore' => '了解更多',
        'pg_about_tagline' => '定制化工业机器人自动化系统集成方案',
        'pg_about_intro' => '了解辰轩的定制自动化解决方案',
        'pg_products_title' => '产品中心',
        'pg_products_desc' => '工业机器人与协作机器人产品系列，服务复杂严苛与柔性协作两类核心生产场景。',
        'pg_solutions_title' => '解决方案',
        'pg_solutions_desc' => '基于行业经验的智能场景解决方案。',
        'pg_industry_title' => '基于行业经验的智能场景解决方案',
        'pg_app_title' => '典型应用',
        'pg_app_desc' => '围绕焊接、喷涂、搬运、切割、折弯、点胶、上下料、打磨、冲压、雕刻等工艺交付可运行的自动化系统。',
        'pg_workstation_title' => '自动化工作站',
        'pg_service_title' => '自动化集成解决方案服务体系',
        'pg_service_desc' => '以客户为中心的全流程工程服务。',
        'pg_news_title' => '新闻',
        'pg_news_desc' => '辰轩与您分享每一个智能制造升级瞬间。',
        'pg_contact_title' => '联系辰轩',
        'pg_contact_desc' => '提交您的工艺需求、产线现状与自动化目标，辰轩将协助您规划适配方案。',
        'pg_download_title' => '下载中心',
        'pg_download_desc' => '沉淀自动化项目资料、方案说明与培训支持内容。',
        'pg_cases_title' => '案例展示',
        'pg_cases_desc' => '推动全球智能制造升级。',
        'contact_name' => '姓名',
        'contact_name_ph' => '请输入姓名',
        'contact_phone' => '联系电话',
        'contact_phone_ph' => '请输入联系电话',
        'contact_email_label' => '邮箱',
        'contact_email_ph' => '请输入邮箱',
        'contact_company' => '公司名称',
        'contact_company_ph' => '请输入公司名称',
        'contact_message' => '需求描述',
        'contact_message_ph' => '请简要描述工艺、节拍、现场条件或自动化目标',
        'contact_agree' => '我已阅读并同意',
        'contact_submit' => '提交需求',
        'lead_success' => '需求已收到，辰轩工程团队将尽快与您联系。',
        'lead_submitting' => '提交中...',
        'lead_err_required' => '请填写姓名、公司、电话和需求描述。',
        'lead_err_email' => '请输入有效邮箱。',
        'lead_err_phone' => '请输入有效联系电话。',
        'lead_err_save' => '提交失败，请稍后再试。',
        'ct_phone' => '项目咨询',
        'ct_phone_note' => '留下需求后由辰轩工程团队联系',
        'ct_email' => '技术沟通',
        'ct_email_note' => '适合提交工艺、现场条件与方案资料',
        'ct_address' => '服务范围',
        'ct_address_val' => '面向制造企业自动化升级项目',
        'ct_address_note' => '覆盖工业机器人与自动化系统集成',
        'ct_form_title' => '告诉我们您的自动化需求',
        'ct_form_desc' => '请填写工艺场景、产线目标和现场约束，便于我们快速判断方案方向。',
        'ct_benefit1' => '基于真实工艺需求评估方案',
        'ct_benefit2' => '覆盖设计、交付、运维和培训',
        'ct_benefit3' => '关注效率、质量一致性和稳定运行',
        'ct_benefit4' => '支持非标定制与标准化项目管理',
        'ct_name' => '姓名',
        'ct_name_ph' => '请输入姓名',
        'ct_company' => '公司',
        'ct_company_ph' => '请输入公司名称',
        'ct_phone_label' => '电话',
        'ct_phone_ph' => '请输入联系电话',
        'ct_email_label' => '邮箱',
        'ct_email_ph' => '请输入邮箱',
        'ct_industry' => '所属行业',
        'ct_select' => '请选择',
        'ct_other' => '其他',
        'ct_message' => '需求描述',
        'ct_message_ph' => '请描述需要自动化的工艺、产品、节拍或现场条件',
        'ct_agree' => '我已阅读并同意',
        'ct_and' => '和',
        'ct_submit' => '提交需求',
        'ct_offices' => '服务场景',
        'err_404_title' => '页面暂时不可达',
        'err_404_desc' => '您访问的页面不存在或已调整位置，可以返回首页继续了解辰轩自动化方案。',
        'err_404_home' => '返回首页',
        'auth_login_title' => '登录辰轩账号',
        'auth_sms_login' => '验证码登录',
        'auth_pwd_login' => '密码登录',
        'auth_account' => '账号',
        'auth_account_ph' => '请输入手机号或邮箱',
        'auth_code' => '验证码',
        'auth_code_ph' => '请输入验证码',
        'auth_get_code' => '获取验证码',
        'auth_password' => '密码',
        'auth_password_ph' => '请输入密码',
        'auth_login_btn' => '登录',
        'auth_new_user' => '还没有账号？',
        'auth_register_link' => '注册辰轩账号',
        'auth_forgot' => '忘记密码',
        'auth_third_party' => '其他方式',
        'auth_wechat' => '微信',
        'auth_register_title' => '注册辰轩账号',
        'auth_step_register' => '注册账号',
        'auth_step_profile' => '完善资料',
        'auth_step_success' => '注册成功',
        'auth_sms_register' => '验证码注册',
        'auth_pwd_register' => '密码注册',
        'auth_account_reg_ph' => '请输入手机号或邮箱',
        'auth_set_pwd_ph' => '请设置密码',
        'auth_confirm_pwd' => '确认密码',
        'auth_confirm_pwd_ph' => '请再次输入密码',
        'auth_register_btn' => '注册',
        'auth_has_account' => '已有账号？',
        'auth_login_link' => '登录辰轩账号',
        'auth_code_sent' => '验证码已发送',
        'auth_login_success' => '登录成功',
        'auth_logout_success' => '已退出登录',
        'auth_register_success' => '注册成功',
        'auth_err_required' => '请填写必填项',
        'auth_err_phone' => '请输入有效手机号或邮箱',
        'auth_err_code' => '请输入验证码',
        'auth_err_credentials' => '账号或密码错误',
        'auth_err_exists' => '账号已存在',
        'auth_err_pwd_len' => '密码长度至少 6 位',
        'auth_err_pwd_match' => '两次输入的密码不一致',
        'auth_err_too_fast' => '操作太频繁，请稍后再试',
        'auth_err_agree' => '请阅读并同意协议',
        'auth_err_network' => '网络错误，请稍后再试',
        'auth_sms_disabled' => '短信验证码功能暂未开放，请使用密码登录或注册。',
    ];

    $en = [
        'nav_products' => 'Industrial Robots',
        'nav_cobots' => 'Collaborative Robots',
        'nav_solutions' => 'Solutions',
        'nav_cases' => 'Case Center',
        'nav_service' => 'Service & Support',
        'nav_download' => 'Download Center',
        'nav_news' => 'News',
        'nav_about' => 'About ChenXuan',
        'btn_consult' => 'Consult Online',
        'btn_login' => 'Log in',
        'btn_register' => 'Register',
        'btn_logout' => 'Log out',
        'btn_search' => 'Search',
        'learn_more' => 'Learn More',
        'explore_more' => 'Explore More',
        'view_all' => 'View All',
        'btn_read_more' => 'Read More',
        'btn_load_more' => 'Load More',
        'btn_view_detail' => 'View Details',
        'mega_about_tagline' => 'Customized industrial robot automation system integration',
        'mega_contact' => 'Contact Us',
        'footer_copyright' => 'Copyright ChenXuan Robotics',
        'ftr_desc' => 'Customized industrial robot automation integration for manufacturers that need efficiency, stable quality and less labor dependency.',
        'privacy_policy' => 'Privacy Policy',
        'user_agreement' => 'User Agreement',
        'personal_info' => 'Personal Information Protection',
        'cookie_policy' => 'Cookie Policy',
        'legal_privacy_body' => 'We collect only the information needed for project communication, including name, company, phone, email and automation requirements. This information is used for ChenXuan project consultation, solution evaluation, delivery communication and necessary customer service.',
        'legal_user_body' => 'By accessing and using the ChenXuan website, you understand that the site presents ChenXuan robotic automation integration capabilities. Specific project scope, deliverables and commercial terms are subject to formal contracts or written confirmation.',
        'legal_personal_body' => 'ChenXuan processes personal information under lawful, proper and necessary principles. You may submit correction, deletion or stop-use requests through the contact page, and we will handle them within a reasonable time.',
        'legal_cookie_body' => 'This site uses cookies to remember basic browsing preferences and improve the experience. You can manage or delete cookies through your browser settings, though some interactions may be affected.',
        'legal_contact_note' => 'For more information about data handling or to submit a request, please contact ChenXuan through the contact page.',
        'cookie_text' => 'We use cookies to improve your browsing experience. By continuing, you agree to our',
        'cookie_accept' => 'Accept',
        'cookie_decline' => 'Decline',
        'back_to_top' => 'Back to Top',
        'sidebar_consult' => 'Online Consultation',
        'sidebar_sample' => 'Book a Discussion',
        'search_placeholder' => 'Search industry, process or automation needs',
        'search_no_results' => 'No results found',
        'search_found_tip' => 'Found %s results for "%s"',
        'search_tab_download' => 'Downloads',
        'search_tab_faq' => 'FAQ',
        'search_tab_product' => 'Products',
        'search_tab_solution' => 'Solutions',
        'search_tab_news' => 'News',
        'hero_explore' => 'Explore Products',
        'hero_solutions' => 'Solutions',
        'section_products' => 'Products',
        'section_solutions' => 'Smart scenario solutions based on industry experience',
        'section_service' => 'Automation Integration Service System',
        'section_news' => 'Automation Insights · Manufacturing Futures',
        'products_desc' => 'Industrial and collaborative robot systems matched to real production processes.',
        'solutions_desc' => 'Covering construction machinery, automotive parts, metal processing, packaging, heavy equipment, AGV logistics and smart commerce.',
        'service_desc' => 'Customer-centered end-to-end engineering services.',
        'news_desc' => 'ChenXuan shares every smart manufacturing upgrade moment with you.',
        'news_read' => 'Read Now',
        'news_explore' => 'Learn More',
        'pg_about_tagline' => 'Customized industrial robot automation system integration',
        'pg_about_intro' => 'Explore ChenXuan customized automation solutions',
        'pg_products_title' => 'Products',
        'pg_products_desc' => 'Industrial and collaborative robot product series for demanding and flexible production scenarios.',
        'pg_solutions_title' => 'Solutions',
        'pg_solutions_desc' => 'Smart scenario solutions based on industry experience.',
        'pg_industry_title' => 'Smart scenario solutions based on industry experience',
        'pg_app_title' => 'Applications',
        'pg_app_desc' => 'Deliverable automation systems for welding, spraying, handling, cutting, bending, dispensing, loading, grinding, stamping and engraving.',
        'pg_workstation_title' => 'Automation Workstations',
        'pg_service_title' => 'Automation Integration Service System',
        'pg_service_desc' => 'Customer-centered end-to-end engineering services.',
        'pg_news_title' => 'News',
        'pg_news_desc' => 'ChenXuan shares every smart manufacturing upgrade moment with you.',
        'pg_contact_title' => 'Contact ChenXuan',
        'pg_contact_desc' => 'Submit your process needs, current production status and automation goals.',
        'pg_download_title' => 'Download Center',
        'pg_download_desc' => 'Automation project documents, solution notes and training materials.',
        'pg_cases_title' => 'Case Studies',
        'pg_cases_desc' => 'Advancing global smart manufacturing upgrades.',
        'contact_name' => 'Name',
        'contact_name_ph' => 'Enter your name',
        'contact_phone' => 'Phone',
        'contact_phone_ph' => 'Enter your phone',
        'contact_email_label' => 'Email',
        'contact_email_ph' => 'Enter your email',
        'contact_company' => 'Company',
        'contact_company_ph' => 'Enter company name',
        'contact_message' => 'Requirements',
        'contact_message_ph' => 'Briefly describe process, cycle time, site conditions or automation goals',
        'contact_agree' => 'I have read and agree to',
        'contact_submit' => 'Submit Request',
        'lead_success' => 'Your request has been received. ChenXuan engineers will contact you soon.',
        'lead_submitting' => 'Submitting...',
        'lead_err_required' => 'Please enter name, company, phone and requirements.',
        'lead_err_email' => 'Please enter a valid email.',
        'lead_err_phone' => 'Please enter a valid phone number.',
        'lead_err_save' => 'Submission failed. Please try again later.',
        'ct_phone' => 'Project Consultation',
        'ct_phone_note' => 'ChenXuan engineers will contact you after receiving your request',
        'ct_email' => 'Technical Discussion',
        'ct_email_note' => 'Submit process, site conditions and solution documents',
        'ct_address' => 'Service Scope',
        'ct_address_val' => 'Automation upgrades for manufacturing enterprises',
        'ct_address_note' => 'Industrial robot and automation system integration',
        'ct_form_title' => 'Tell us your automation needs',
        'ct_form_desc' => 'Fill in process scenario, production goals and site constraints.',
        'ct_benefit1' => 'Evaluate solutions from real process needs',
        'ct_benefit2' => 'Cover design, delivery, O&M and training',
        'ct_benefit3' => 'Focus on efficiency, quality consistency and stable operation',
        'ct_benefit4' => 'Support non-standard customization and standardized project management',
        'ct_name' => 'Name',
        'ct_name_ph' => 'Enter your name',
        'ct_company' => 'Company',
        'ct_company_ph' => 'Enter company name',
        'ct_phone_label' => 'Phone',
        'ct_phone_ph' => 'Enter phone number',
        'ct_email_label' => 'Email',
        'ct_email_ph' => 'Enter email',
        'ct_industry' => 'Industry',
        'ct_select' => 'Please select',
        'ct_other' => 'Other',
        'ct_message' => 'Requirements',
        'ct_message_ph' => 'Describe process, product, cycle time or site conditions',
        'ct_agree' => 'I have read and agree to',
        'ct_and' => 'and',
        'ct_submit' => 'Submit Request',
        'ct_offices' => 'Service Scenarios',
        'err_404_title' => 'Page unavailable',
        'err_404_desc' => 'The page does not exist or has moved. Return home to continue exploring ChenXuan automation solutions.',
        'err_404_home' => 'Back Home',
        'auth_login_title' => 'Log in to ChenXuan',
        'auth_sms_login' => 'Code Login',
        'auth_pwd_login' => 'Password Login',
        'auth_account' => 'Account',
        'auth_account_ph' => 'Phone or email',
        'auth_code' => 'Code',
        'auth_code_ph' => 'Enter verification code',
        'auth_get_code' => 'Get Code',
        'auth_password' => 'Password',
        'auth_password_ph' => 'Enter password',
        'auth_login_btn' => 'Log in',
        'auth_new_user' => 'New user?',
        'auth_register_link' => 'Register ChenXuan account',
        'auth_forgot' => 'Forgot password',
        'auth_third_party' => 'Other methods',
        'auth_wechat' => 'WeChat',
        'auth_register_title' => 'Register ChenXuan account',
        'auth_step_register' => 'Register',
        'auth_step_profile' => 'Profile',
        'auth_step_success' => 'Success',
        'auth_sms_register' => 'Code Register',
        'auth_pwd_register' => 'Password Register',
        'auth_account_reg_ph' => 'Phone or email',
        'auth_set_pwd_ph' => 'Set password',
        'auth_confirm_pwd' => 'Confirm password',
        'auth_confirm_pwd_ph' => 'Enter password again',
        'auth_register_btn' => 'Register',
        'auth_has_account' => 'Already have an account?',
        'auth_login_link' => 'Log in to ChenXuan',
        'auth_code_sent' => 'Code sent',
        'auth_login_success' => 'Login successful',
        'auth_logout_success' => 'Logged out',
        'auth_register_success' => 'Registration successful',
        'auth_err_required' => 'Please complete required fields',
        'auth_err_phone' => 'Enter a valid phone or email',
        'auth_err_code' => 'Enter verification code',
        'auth_err_credentials' => 'Invalid account or password',
        'auth_err_exists' => 'Account already exists',
        'auth_err_pwd_len' => 'Password must be at least 6 characters',
        'auth_err_pwd_match' => 'Passwords do not match',
        'auth_err_too_fast' => 'Too many attempts. Try again later',
        'auth_err_agree' => 'Please read and agree to the terms',
        'auth_err_network' => 'Network error. Please try again later',
        'auth_sms_disabled' => 'SMS verification is not enabled. Please use password login or registration.',
    ];

    $localized = [
        'ja' => ['nav_products' => '産業用ロボット', 'nav_cobots' => '協働ロボット', 'nav_solutions' => 'ソリューション', 'nav_cases' => '事例', 'nav_service' => 'サービス', 'nav_download' => 'ダウンロード', 'nav_news' => 'ニュース', 'nav_about' => 'ChenXuanについて'],
        'es' => ['nav_products' => 'Robots industriales', 'nav_cobots' => 'Robots colaborativos', 'nav_solutions' => 'Soluciones', 'nav_cases' => 'Casos', 'nav_service' => 'Servicio', 'nav_download' => 'Descargas', 'nav_news' => 'Noticias', 'nav_about' => 'Acerca de ChenXuan'],
        'de' => ['nav_products' => 'Industrieroboter', 'nav_cobots' => 'Kollaborative Roboter', 'nav_solutions' => 'Lösungen', 'nav_cases' => 'Fälle', 'nav_service' => 'Service', 'nav_download' => 'Downloads', 'nav_news' => 'News', 'nav_about' => 'Über ChenXuan'],
        'fr' => ['nav_products' => 'Robots industriels', 'nav_cobots' => 'Robots collaboratifs', 'nav_solutions' => 'Solutions', 'nav_cases' => 'Cas', 'nav_service' => 'Service', 'nav_download' => 'Téléchargements', 'nav_news' => 'Actualités', 'nav_about' => 'À propos de ChenXuan'],
        'th' => ['nav_products' => 'หุ่นยนต์อุตสาหกรรม', 'nav_cobots' => 'หุ่นยนต์ร่วมปฏิบัติงาน', 'nav_solutions' => 'โซลูชัน', 'nav_cases' => 'กรณี', 'nav_service' => 'บริการ', 'nav_download' => 'ดาวน์โหลด', 'nav_news' => 'ข่าว', 'nav_about' => 'เกี่ยวกับ ChenXuan'],
        'ko' => ['nav_products' => '산업용 로봇', 'nav_cobots' => '협동 로봇', 'nav_solutions' => '솔루션', 'nav_cases' => '사례', 'nav_service' => '서비스', 'nav_download' => '다운로드', 'nav_news' => '뉴스', 'nav_about' => 'ChenXuan 소개'],
        'it' => ['nav_products' => 'Robot industriali', 'nav_cobots' => 'Robot collaborativi', 'nav_solutions' => 'Soluzioni', 'nav_cases' => 'Casi', 'nav_service' => 'Servizio', 'nav_download' => 'Download', 'nav_news' => 'Notizie', 'nav_about' => 'Informazioni su ChenXuan'],
        'vi' => ['nav_products' => 'Robot công nghiệp', 'nav_cobots' => 'Robot cộng tác', 'nav_solutions' => 'Giải pháp', 'nav_cases' => 'Trường hợp', 'nav_service' => 'Dịch vụ', 'nav_download' => 'Tải xuống', 'nav_news' => 'Tin tức', 'nav_about' => 'Về ChenXuan'],
    ];

    if ($lang === 'zh_tw') {
        return isset($zh[$key]) ? chenxuan_to_traditional(chenxuan_normalize_brand_copy($zh[$key])) : null;
    }
    if ($lang === 'zh') {
        return isset($zh[$key]) ? chenxuan_normalize_brand_copy($zh[$key]) : null;
    }
    if (in_array($lang, ['en', 'en_eu'], true)) {
        return $en[$key] ?? null;
    }

    $map = [];
    foreach ($en as $item_key => $value) {
        $map[$item_key] = chenxuan_translate_from_english($value, $lang, $item_key);
    }
    if (isset($localized[$lang])) {
        $map = array_merge($map, $localized[$lang]);
    }
    return $map[$key] ?? null;
}
