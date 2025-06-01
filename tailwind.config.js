/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      
      // Path di bawah ini penting agar style di halaman admin Filament Anda tidak rusak
      './app/Filament/**/*.php',
      './resources/views/filament/**/*.blade.php',
      './vendor/filament/**/*.blade.php',
    ],
    theme: {
      extend: {
        fontFamily: {
            // DIPERBAIKI: Semua nama font harus dalam tanda kutip string
            sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji',
                'Segoe UI Symbol', 'Noto Color Emoji']
        },
        colors: {
            // Konfigurasi warna Anda sudah benar!
            'brand-blue': '#3A5FCD',
            'brand-blue-light': '#EBF0FF',
            'brand-gray': '#F0F2F5',
            'text-primary': '#333333',
            'text-secondary': '#555555',
            'sidebar-bg': '#2C3E50',
            'sidebar-text': '#ECF0F1',
            'sidebar-active': '#3498DB',
        }
      },
    },
    plugins: [
      // Plugin ini biasanya diperlukan untuk styling form Filament
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
    ],
  }