(function () {
    const endpoint = document.querySelector('meta[name="visitor-tracking-endpoint"]')?.content;

    if (!endpoint || window.location.pathname.startsWith('/admins')) {
        return;
    }

    const sessionKeyName = 'soapbox_visitor_session';
    const visitKey = crypto.randomUUID ? crypto.randomUUID() : String(Date.now()) + Math.random().toString(16).slice(2);
    const startedAt = Date.now();

    const getSessionKey = () => {
        let key = localStorage.getItem(sessionKeyName);

        if (!key) {
            key = crypto.randomUUID ? crypto.randomUUID() : String(Date.now()) + Math.random().toString(16).slice(2);
            localStorage.setItem(sessionKeyName, key);
        }

        return key;
    };

    const getDeviceType = () => {
        const width = window.innerWidth;
        const userAgent = navigator.userAgent.toLowerCase();

        if (/tablet|ipad/.test(userAgent) || width >= 768 && width < 992) return 'tablet';
        if (/mobile|iphone|android/.test(userAgent) || width < 768) return 'mobile';

        return 'desktop';
    };

    const getBrowser = () => {
        const userAgent = navigator.userAgent;

        if (userAgent.includes('Edg/')) return 'Edge';
        if (userAgent.includes('Chrome/')) return 'Chrome';
        if (userAgent.includes('Firefox/')) return 'Firefox';
        if (userAgent.includes('Safari/') && !userAgent.includes('Chrome/')) return 'Safari';

        return 'Unknown';
    };

    const getOs = () => {
        const platform = navigator.platform || '';
        const userAgent = navigator.userAgent;

        if (/Win/.test(platform)) return 'Windows';
        if (/Mac/.test(platform)) return 'macOS';
        if (/Linux/.test(platform)) return 'Linux';
        if (/Android/.test(userAgent)) return 'Android';
        if (/iPhone|iPad|iPod/.test(userAgent)) return 'iOS';

        return 'Unknown';
    };

    const payload = (eventName) => ({
        session_key: getSessionKey(),
        visit_key: visitKey,
        event: eventName,
        page_title: document.title,
        page_path: window.location.pathname,
        page_url: window.location.href,
        referrer: document.referrer,
        duration_seconds: Math.max(0, Math.round((Date.now() - startedAt) / 1000)),
        started_at_ms: startedAt,
        device_name: navigator.platform || 'Unknown',
        device_type: getDeviceType(),
        browser: getBrowser(),
        os: getOs(),
        language: navigator.language || '',
        timezone: Intl.DateTimeFormat().resolvedOptions().timeZone || '',
        screen_size: `${window.screen.width}x${window.screen.height}`
    });

    const send = (eventName) => {
        const data = payload(eventName);
        const formData = new FormData();

        Object.entries(data).forEach(([key, value]) => formData.append(key, value ?? ''));

        if (navigator.sendBeacon) {
            navigator.sendBeacon(endpoint, formData);
            return;
        }

        fetch(endpoint, {
            method: 'POST',
            body: formData,
            credentials: 'same-origin',
            keepalive: true
        }).catch(() => {});
    };

    send('pageview');

    const heartbeat = window.setInterval(() => send('heartbeat'), 15000);

    document.addEventListener('visibilitychange', () => {
        if (document.visibilityState === 'hidden') {
            send('unload');
        }
    });

    window.addEventListener('pagehide', () => {
        window.clearInterval(heartbeat);
        send('unload');
    });
})();
