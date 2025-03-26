# Guida all'Esecuzione di PHPStan in Laraxot PTVX

Questo documento spiega come eseguire correttamente PHPStan nel framework Laraxot PTVX per identificare e risolvere gli errori a livello 9.

## Esecuzione Base di PHPStan

PHPStan deve essere sempre eseguito dalla cartella principale dell'applicazione Laravel:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
./vendor/bin/phpstan analyse --level=9 --memory-limit=2G Modules/NomeModulo
```

È fondamentale includere il percorso relativo `./vendor/bin/phpstan` e non semplicemente `phpstan` o `vendor/bin/phpstan`.

## Opzioni Comuni per PHPStan

- `--level=9`: Specifica il livello di analisi (massimo)
- `--memory-limit=2G`: Aumenta il limite di memoria per evitare errori con progetti complessi
- `--error-format=json`: Genera output in formato JSON per analisi automatizzate
- `--no-progress`: Omette la barra di progresso (utile per log)

## Analisi di Moduli Specifici

Per analizzare un modulo specifico:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
./vendor/bin/phpstan analyse --level=9 --memory-limit=2G Modules/User
```

Per analizzare più moduli contemporaneamente:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
./vendor/bin/phpstan analyse --level=9 --memory-limit=2G Modules/User Modules/Xot
```

## Salvataggio dei Risultati in un File

Per salvare i risultati dell'analisi in un file:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
./vendor/bin/phpstan analyse --level=9 --memory-limit=2G Modules/User > phpstan_user_results.txt
```

## Generazione della Baseline

Per progetti con molti errori, è possibile generare una baseline:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
./vendor/bin/phpstan analyse --level=9 --memory-limit=2G --generate-baseline=phpstan-baseline.neon Modules/User
```

## Script di Utilità per l'Analisi di Tutti i Moduli

Si può creare uno script Bash per analizzare tutti i moduli in sequenza:

```bash
#!/bin/bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
for module in Modules/*; do
    if [ -d "$module" ]; then
        module_name=$(basename "$module")
        echo "Analisi di $module_name..."
        ./vendor/bin/phpstan analyse --level=9 --memory-limit=2G "$module" > "phpstan_${module_name}_results.txt"
        echo "Risultati salvati in phpstan_${module_name}_results.txt"
    fi
done
```

## Analisi Incrementale durante lo Sviluppo

Durante lo sviluppo, può essere utile eseguire l'analisi solo sui file modificati:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
git diff --name-only | grep -E '\.php$' | xargs ./vendor/bin/phpstan analyse --level=9
```

## Importante: Configurazione PHPStan

La configurazione di PHPStan si trova nel file `phpstan.neon` nella directory principale di Laravel. Assicurarsi che questo file contenga le configurazioni appropriate per il progetto. 