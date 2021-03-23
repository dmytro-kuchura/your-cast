export function getBreadcrumbs(props) {
    if (props.pathname === '/account/confirm-email') {
        return [
            {
                name: 'Confirm email',
                link: '/account/confirm-email'
            }
        ];
    }

    if (props.pathname === '/account/dashboard') {
        return [
            {
                name: 'Dashboard',
                link: '/account/dashboard'
            }
        ];
    }

    return [];
}
