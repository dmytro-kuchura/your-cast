import Noty from 'noty';

export function notification(text, type = 'info') {
    return new Noty({
        text: text,
        type: type,
    }).show();
}

