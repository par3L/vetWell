/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        // PRIMARY - Brand Identity (Teal)
        primary: {
          50: '#F0F8F6',
          100: '#E0F1ED',
          200: '#C1E3DB',
          300: '#A2D5C9',
          400: '#5D9D8D',
          500: '#48A396',  // Light teal
          600: '#2D7A6E',  // Main brand
          700: '#1F5349',  // Dark teal
          800: '#0F2920',
          900: '#051515',
        },
        // SECONDARY - Warmth (Peach/Cream)
        secondary: {
          50: '#FFF5EC',   // Cream
          100: '#FFE8D6',
          200: '#FFD4B3',
          300: '#FFC090',
          400: '#FFB088',  // Main peach
          500: '#FF9E6D',
          600: '#FF8F5B',  // Orange accent
          700: '#E67342',
          800: '#CC5729',
          900: '#B34110',
        },
        // CREAM - Warmth backgrounds
        cream: {
          50: '#FFF5EC',
          100: '#FBF8F3',
          200: '#F7F1E8',
          300: '#F3EADD',
          400: '#EFE3D2',
          500: '#EBDCC7',
          600: '#E7D5BC',
          700: '#E3CEB1',
          800: '#DFC7A6',
          900: '#DBC09B',
        },
        // ACCENT - Actions & Info
        accent: {
          50: '#EBF5FD',
          100: '#D7EBFA',
          200: '#AFD7F5',
          300: '#87C3F0',
          400: '#5FADEB',
          500: '#4A9FD8',  // Info blue
          600: '#3B8BC6',
          700: '#2C77B4',
          800: '#1D63A2',
          900: '#0E4F90',
        },
        // SUCCESS - Medical Safe
        success: {
          50: '#F1F9F5',
          100: '#E3F3EB',
          200: '#C7E7D7',
          300: '#ABDBC3',
          400: '#8FCFAF',
          500: '#52C77B',  // Main success
          600: '#3DB863',
          700: '#2BA04B',
          800: '#228839',
          900: '#1A7027',
        },
        // WARNING - Attention
        warning: {
          50: '#FFFAF5',
          100: '#FFF5EB',
          200: '#FFEBD7',
          300: '#FFE1C3',
          400: '#FFD7AF',
          500: '#FFA94D',  // Main warning
          600: '#FF9E1A',
          700: '#E68900',
          800: '#CC7700',
          900: '#B36600',
        },
        // ERROR - Soft Alert
        error: {
          50: '#FEF5F5',
          100: '#FDEBEB',
          200: '#FBD7D7',
          300: '#F9C3C3',
          400: '#F7AFAF',
          500: '#E85D5D',  // Soft red
          600: '#E63D3D',
          700: '#CC2E2E',
          800: '#B32020',
          900: '#991111',
        },
        // NEUTRAL - Text & Backgrounds
        neutral: {
          50: '#FFFFFF',
          100: '#F7F9FA',  // Light gray
          200: '#FBF8F3',  // Cream bg
          300: '#E5F0ED',  // Light border
          400: '#C7DDD8',  // Medium border
          500: '#8B9D99',  // Muted text
          600: '#5A7A76',  // Secondary text
          700: '#2C3E50',  // Alternative dark
          800: '#1A3A35',  // Primary text
          900: '#0F1D1A',
        },
      },
      fontFamily: {
        sans: ['Nunito', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        heading: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        display: ['Quicksand', 'Poppins', 'sans-serif'],
        mono: ['JetBrains Mono', 'ui-monospace', 'monospace'],
      },
      fontSize: {
        'xs': ['0.75rem', { lineHeight: '1rem' }],      // 12px
        'sm': ['0.875rem', { lineHeight: '1.25rem' }],  // 14px
        'base': ['1rem', { lineHeight: '1.5rem' }],     // 16px
        'lg': ['1.125rem', { lineHeight: '1.75rem' }],  // 18px
        'xl': ['1.25rem', { lineHeight: '1.75rem' }],   // 20px
        '2xl': ['1.5rem', { lineHeight: '2rem' }],      // 24px
        '3xl': ['1.875rem', { lineHeight: '2.25rem' }], // 30px
        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],   // 36px
        '5xl': ['3rem', { lineHeight: '1' }],           // 48px
      },
      spacing: {
        '128': '32rem',
        '144': '36rem',
      },
      borderRadius: {
        'sm': '0.375rem',  // 6px
        'DEFAULT': '0.5rem',  // 8px
        'md': '0.5rem',    // 8px
        'lg': '0.75rem',   // 12px
        'xl': '1rem',      // 16px
        '2xl': '1.5rem',   // 24px
        'full': '9999px',
      },
      boxShadow: {
        'sm': '0 1px 2px rgba(45, 122, 110, 0.05)',
        'DEFAULT': '0 1px 3px rgba(45, 122, 110, 0.08)',
        'md': '0 4px 6px rgba(45, 122, 110, 0.08)',
        'lg': '0 10px 15px rgba(45, 122, 110, 0.1)',
        'xl': '0 20px 25px rgba(45, 122, 110, 0.12)',
        '2xl': '0 25px 50px rgba(45, 122, 110, 0.15)',
      },
      animation: {
        'fade-in': 'fadeIn 0.3s ease-in-out',
        'slide-up': 'slideUp 0.3s ease-out',
        'scale-in': 'scaleIn 0.2s ease-out',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { transform: 'translateY(10px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        scaleIn: {
          '0%': { transform: 'scale(0.95)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
      },
    },
  },
  plugins: [],
}
