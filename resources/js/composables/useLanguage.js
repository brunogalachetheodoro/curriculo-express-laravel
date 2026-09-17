import { useI18n } from 'vue-i18n';
import axios from 'axios';

export const useLanguage = () => {
    const { locale } = useI18n();

    const setLanguage = async (language, saveToBackend = true) => {
        if (!['pt', 'en'].includes(language)) {
            return;
        }

        locale.value = language;

        localStorage.setItem('language', language);

        if (saveToBackend) {
            try {
                await axios.put('/user/language', {
                    language,
                });
            } catch (error) {
                console.log('Error updating language:', error.response?.data);
            }
        }
    };

    const toggleLanguage = () => {
        const newLanguage = locale.value === 'pt' ? 'en' : 'pt';

        setLanguage(newLanguage);
    };

    const loadLanguage = async () => {
        try {
            const response = await axios.get('/user/show-language');

            const language = response.data.language;

            if (!['pt', 'en'].includes(language)) {
                return;
            }

            locale.value = language;

            localStorage.setItem('language', language);
        } catch (error) {
            console.log('Error loading language:', error.response?.data);
        }
    };

    return {
        locale,
        setLanguage,
        toggleLanguage,
        loadLanguage,
    };

};