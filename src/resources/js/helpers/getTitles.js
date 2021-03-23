export function getTitles(props) {
    if (props.pathname === '/account/confirm-email') {
        return 'Confirm email';
    }

    if (props.pathname === '/account/dashboard') {
        return 'Dashboard';
    }

    return 'Dashboard';
}
