<template>
    <field-wrapper>
        <div :class="classes" v-show="hasError">
            {{ firstError }}
        </div>
    </field-wrapper>
</template>
<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'

    export default {

        mixins: [ FormField, HandlesValidationErrors ],

        props: [ 'field' ],

        computed: {
            classes: () => [
                'bg-20',
                'remove-last-margin-bottom',
                'leading-normal',
                'w-full',
                'py-4',
                'px-8',
                'text-danger'
            ],
        },
    }
</script>
