export function getButtons(props) {
    if (props.pathname === '/account/dashboard') {
        return {
            createShow: true,
            createEpisode: true
        };
    }
    if (props.pathname === '/account/show/list') {
        return {
            createShow: true,
            createEpisode: false
        };
    }
    if (props.pathname === '/account/episodes/list') {
        return {
            createShow: false,
            createEpisode: true
        };
    }

    return {
        createShow: false,
        createEpisode: false
    };
}
