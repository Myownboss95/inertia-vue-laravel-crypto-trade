import { info, error } from "./toast"

export const copy = text => {
    navigator
        .clipboard
        .writeText(text)
        .then(
            _ => info('Copied to clipboard'),
            _ => error('Copy to clipboard failed.')

        )
}

export const str_limit = (str, limit = 10, end = '...') => {
    if (str.length > limit) str = str.slice(0, limit) + end;
    return str;
}


