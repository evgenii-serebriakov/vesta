import { computed } from 'vue';
import { requiredField, minLengthChar } from './validators';

export const rulesPost = computed(() => ({
    title: {
        required: requiredField('Заполните поле!'),
        minLength: minLengthChar({ 
            message: 'Минимальная длинна заголовка 3 символа!',
            length: 3 
        })
    },
    message: { 
        required: requiredField('Заполните поле!'),
        minLength: minLengthChar({ 
            message: 'Минимальная длинна описания 5 символов!',
            length: 5 
        })
    }
}));