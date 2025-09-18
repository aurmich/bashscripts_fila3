<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Configurazione Tailwind CSS per il progetto Laraxot PTVX
/**
 * Configurazione Tailwind CSS per il progetto
  *
 * Perché: Tailwind CSS è un framework CSS utility-first che permette di costruire
 * interfacce moderne e responsive con un approccio component-first. Questa configurazione
 * definisce come Tailwind deve essere compilato e quali estensioni utilizzare.
 *
 * Cosa: Questa configurazione definisce:
 * - I percorsi dei file da analizzare per il purging delle classi non utilizzate
 * - Le estensioni al tema di base (colori, font, spaziature, ecc.)
 * - I plugin da utilizzare per funzionalità aggiuntive
 *
 * @type {import('tailwindcss').Config}
 */
module.exports = {
  content: [
    // Percorsi dei file da analizzare per il purging
    './laravel/Modules/**/Resources/views/**/*.blade.php',
    './laravel/Modules/**/Resources/js/**/*.js',
    './laravel/Modules/**/Resources/js/**/*.vue',
  ],
  theme: {
    extend: {
      // Estensioni al tema di base
      colors: {
        primary: {
          50: '#f0f9ff',
          100: '#e0f2fe',
          500: '#0ea5e9',
          700: '#0369a1',
          900: '#0c4a6e',
        },
      },
      fontFamily: {
        sans: ['Inter var', 'sans-serif'],
      },
    },
  },
  plugins: [
    // Plugin per form elements, typography e altri componenti
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
=======
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> a8f30311 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
/** @type {import('tailwindcss').Config} */
module.exports = {
=======
/** @type {import('tailwindcss').Config} */
export default {
>>>>>>> c986cc10 (first)
=======
/** @type {import('tailwindcss').Config} */
module.exports = {
>>>>>>> 8fc3049b (first)
=======
/** @type {import('tailwindcss').Config} */
module.exports = {
>>>>>>> e83070fd (.)
=======
/** @type {import('tailwindcss').Config} */
module.exports = {
>>>>>>> 58e1cada (.)
  content: [],
  theme: {
    extend: {},
  },
  plugins: [],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
  }

=======
}
>>>>>>> 59bc4fe7 (first)
=======
}
>>>>>>> a8f30311 (first)
=======
}
>>>>>>> c088001a (first)
=======
}
>>>>>>> d79d9e57 (first)
=======
}
>>>>>>> 0d55b583 (first)
=======
}
>>>>>>> 9cec72d6 (first)
=======
}
>>>>>>> c986cc10 (first)
=======
}
>>>>>>> 8fc3049b (first)
=======
import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        '../../Modules/*/Filament/**/*.php',
        '../../Modules/*/resources/views/filament/**/*.blade.php',
        '../../Modules/*/vendor/filament/**/*.blade.php',
        '../../Filament/**/*.php',
        '../../resources/views/filament/**/*.blade.php',
        '../../vendor/filament/**/*.blade.php',
        '../../storage/framework/views/*.php',
    ],
}
>>>>>>> dc18abbe (first)
=======
}
>>>>>>> e83070fd (.)
=======
}
>>>>>>> 58e1cada (.)

=======
=======
>>>>>>> d8b9f8a6 (up)
=======
>>>>>>> d516087e (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {},
  },
  plugins: [],
}

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f2e91737 (.)
=======
>>>>>>> d8b9f8a6 (up)
=======
>>>>>>> d516087e (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
