<script setup>
    import { HTTP } from '../axios';
    import { ref } from 'vue';

    const form = ref({
        name: null,
        phone: null,
        appealText: null
    })

    let errors = ref([])
    let hasErrors = ref(false)

    const submit = () => {
        HTTP.post('/api/appeal/store', form.value)
            .then((response) => {
                hasErrors.value = false;
                errors.value = [];
                form.value.name = null;
                form.value.phone = null;
                form.value.appealText = null;
            })
            .catch((e) => {
                errors.value = e.response.data.errors;
                hasErrors.value = true;
            })
    }
</script>

<template>
    <div class="container page">
        <div class="feedback">
            <form class="form" name="form" @submit.prevent="submit">
                <div v-if="hasErrors">
                    <div class="font-medium fw-bold text-red-600">Упс! Что-то пошло не так!</div>

                    <ul class="mt-3 list-disc list-inside text-sm text-danger">
                        <li v-for="(error, key) in errors" :key="key">{{ error[0] }}</li>
                    </ul>
                </div>
                <div class="mb-3">
                    <input v-model="form.name" type="name" class="form-control" id="name" aria-describedby="name" placeholder="Введите имя">
                </div>
                <div class="mb-3">
                    <input v-model="form.phone" type="phone" class="form-control" id="phone" aria-describedby="phone" placeholder="Введите телефон">
                </div>
                <div class="mb-3">
                    <label for="appealText" class="form-label">Текст обращения</label>
                    <textarea v-model="form.appealText" class="form-control" id="appealText" rows="3"></textarea>
                </div>
                <button
                    type="submit" class="btn btn-primary"
                >
                    Отправить
                </button>
            </form>
        </div>
    </div>
</template>

<style scoped>
    .page {
        display: flex;
        height: 100vh;
        align-items: center;
    }
    .feedback {
        width: 600px;
        border: 1px solid #000;
        border-radius: 10px;
        padding: 30px;
        margin: 0 auto;
        height: fit-content;
    }
    .form {
        
    }
</style>