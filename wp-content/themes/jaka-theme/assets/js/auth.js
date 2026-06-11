/**
 * ChenXuan Auth - Login/Register AJAX & UI logic
 */
(function() {
    'use strict';

    var ajaxUrl = window.jakaData ? window.jakaData.ajaxUrl : '/wp-admin/admin-ajax.php';
    var nonce   = window.jakaData ? window.jakaData.nonce : '';
    var agreeText = window.jakaData && window.jakaData.authAgreeRequired ? window.jakaData.authAgreeRequired : '请阅读并同意协议';
    var networkText = window.jakaData && window.jakaData.authNetworkError ? window.jakaData.authNetworkError : '网络错误';

    function postData(action, data) {
        var formData = new FormData();
        formData.append('action', action);
        formData.append('nonce', nonce);
        Object.keys(data).forEach(function(k) {
            formData.append(k, data[k]);
        });
        return fetch(ajaxUrl, {
            method: 'POST',
            credentials: 'same-origin',
            body: formData,
        }).then(function(r) { return r.json(); });
    }

    function showToast(message, isError) {
        var t = document.createElement('div');
        t.className = 'jaka-toast' + (isError ? ' error' : '');
        t.textContent = message || '';
        document.body.appendChild(t);
        setTimeout(function() { t.classList.add('show'); }, 10);
        setTimeout(function() {
            t.classList.remove('show');
            setTimeout(function() {
                if (t.parentNode) t.parentNode.removeChild(t);
            }, 300);
        }, 2500);
    }

    /* ══ Tab switching (already present in template but re-bind safely) ══ */
    function initAuthTabs() {
        document.querySelectorAll('.auth-tab').forEach(function(tab) {
            tab.addEventListener('click', function() {
                var card = tab.closest('.auth-card');
                if (!card) return;
                card.querySelectorAll('.auth-tab').forEach(function(t) { t.classList.remove('active'); });
                card.querySelectorAll('.auth-panel').forEach(function(p) { p.classList.remove('active'); });
                tab.classList.add('active');
                var target = card.querySelector('#auth-panel-' + tab.dataset.tab);
                if (target) target.classList.add('active');
            });
        });
    }

    /* ══ SMS code button ══ */
    function initSmsCodeBtns() {
        document.querySelectorAll('.btn-sms-code').forEach(function(btn) {
            btn.addEventListener('click', function() {
                if (btn.disabled) return;
                var form = btn.closest('.auth-form');
                var accountInput = form ? form.querySelector('input[name="account"]') : null;
                var phone = accountInput ? accountInput.value.trim() : '';
                if (!phone) {
                    showToast('请输入手机号', true);
                    if (accountInput) accountInput.focus();
                    return;
                }
                var original = btn.textContent;
                btn.disabled = true;
                btn.textContent = '发送中...';
                postData('jaka_send_sms', { phone: phone }).then(function(res) {
                    if (res.success) {
                        var seconds = 60;
                        showToast(res.message || '验证码已发送');
                    if (res.debug_code) console.log('[ChenXuan SMS debug]', res.debug_code);
                        var tick = setInterval(function() {
                            seconds--;
                            btn.textContent = seconds + 's';
                            if (seconds <= 0) {
                                clearInterval(tick);
                                btn.disabled = false;
                                btn.textContent = original;
                            }
                        }, 1000);
                    } else {
                        showToast(res.message || '发送失败', true);
                        btn.disabled = false;
                        btn.textContent = original;
                    }
                }).catch(function() {
                    btn.disabled = false;
                    btn.textContent = original;
                    showToast(networkText, true);
                });
            });
        });
    }

    /* ══ Login forms ══ */
    function initLoginForms() {
        var smsForm = document.getElementById('login-sms-form');
        if (smsForm) {
            smsForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var data = {
                    account: smsForm.account.value.trim(),
                    code:    smsForm.sms_code.value.trim(),
                };
                if (!smsForm.agree.checked) {
                    showToast(agreeText, true);
                    return;
                }
                postData('jaka_login_sms', data).then(function(res) {
                    showToast(res.message, !res.success);
                    if (res.success && res.redirect) {
                        setTimeout(function() { window.location.href = res.redirect; }, 600);
                    }
                });
            });
        }
        var pwdForm = document.getElementById('login-pwd-form');
        if (pwdForm) {
            pwdForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var data = {
                    account:  pwdForm.account.value.trim(),
                    password: pwdForm.password.value,
                };
                if (!pwdForm.agree.checked) {
                    showToast(agreeText, true);
                    return;
                }
                postData('jaka_login_pwd', data).then(function(res) {
                    showToast(res.message, !res.success);
                    if (res.success && res.redirect) {
                        setTimeout(function() { window.location.href = res.redirect; }, 600);
                    }
                });
            });
        }
    }

    /* ══ Register forms ══ */
    function initRegisterForms() {
        var smsForm = document.getElementById('register-sms-form');
        if (smsForm) {
            smsForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var agree = document.querySelector('input[name="agree"]');
                if (agree && !agree.checked) {
                    showToast(agreeText, true);
                    return;
                }
                postData('jaka_register', {
                    type:    'sms',
                    account: smsForm.account.value.trim(),
                    code:    smsForm.sms_code.value.trim(),
                }).then(function(res) {
                    showToast(res.message, !res.success);
                    if (res.success && res.redirect) {
                        setTimeout(function() { window.location.href = res.redirect; }, 600);
                    }
                });
            });
        }
        var pwdForm = document.getElementById('register-pwd-form');
        if (pwdForm) {
            pwdForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var agree = document.querySelector('input[name="agree"]');
                if (agree && !agree.checked) {
                    showToast(agreeText, true);
                    return;
                }
                postData('jaka_register', {
                    type:             'password',
                    account:          pwdForm.account.value.trim(),
                    password:         pwdForm.password.value,
                    password_confirm: pwdForm.password_confirm.value,
                }).then(function(res) {
                    showToast(res.message, !res.success);
                    if (res.success && res.redirect) {
                        setTimeout(function() { window.location.href = res.redirect; }, 600);
                    }
                });
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        initAuthTabs();
        initSmsCodeBtns();
        initLoginForms();
        initRegisterForms();
    });
})();
