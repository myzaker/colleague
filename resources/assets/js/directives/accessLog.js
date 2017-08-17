export default function (el, binding) {
    el.addEventListener('click', () => {
        const log = _.zipObject(
            ['type', 'origin', 'object'],
            binding.value.split('.'),
        );

        vue.$emit('log-access', log);
    });
}
