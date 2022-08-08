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
