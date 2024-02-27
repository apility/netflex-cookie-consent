export function getCookie(key) {

    if (!key) return null;

    return (
        decodeURIComponent(
            document.cookie.replace(
                new RegExp(
                    '(?:(?:^|.*;)\\s*' +
                    encodeURIComponent(key).replace(/[\-\.\+\*]/g, '\\$&') +
                    '\\s*\\=\\s*([^;]*).*$)|^.*$'
                ),
                '$1'
            )
        ) || null
    );
}

export function setCookie(key, expireDays, value, domain) {

    const date = new Date();
    let expires = null;
    let cookieDomain = null;

    if (expireDays) {

        date.setTime(date.getTime() + expireDays * 24 * 60 * 60 * 1000);

        expires = date.toUTCString();
    }
    
    if(domain) {
        cookieDomain = `domain=${domain};`;
    }
        
    document.cookie = `${encodeURIComponent(key)}=${encodeURIComponent(value)}${expires ? `; expires=${expires}` : ''}; path=/; secure; ${cookieDomain}`;

}