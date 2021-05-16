import {
    required,
    minLength,
    helpers
} from '@vuelidate/validators';


export const requiredField = (message) => helpers.withMessage(message, required);

export const minLengthChar = ({ message, length }) => helpers.withMessage(
    ({ $model }) => {
        return `${message} Введено ${$model.length}`;
    },
    minLength(length),
);