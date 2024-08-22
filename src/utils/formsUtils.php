<?php

function printTitle(string $url): void
{
    if (str_contains($url, 'adicionar'))
        echo '<h4>Adicionar ' . (isContatosAdicionar($url) ? 'contato' : 'lugar') . '</h4>';

    if (str_contains($url, 'editar'))
        echo '<h4>Editar ' . (isContatosAdicionar($url) ? 'contato' : 'lugar') . '</h4>';

    if (str_contains($url, 'excluir'))
        echo '<h4>Confirmar exclusão?</h4>';
}

function printInputClass(string $url): void
{
    $operacaoExcluir = isContatosExcluir($url) || isLugaresExcluir($url);

    $inputCssClass = "form-control mb-3 ";
    $disabledInputClass = "bg-secondary bg-opacity-10 not-allowed ";

    $classNames = $inputCssClass . ($operacaoExcluir ? $disabledInputClass : '');

    echo "class='{$classNames}'";
}

function printAttrReadOnly(string $url): void
{
    $operacaoExcluir = isContatosExcluir($url) || isLugaresExcluir($url);

    echo $operacaoExcluir ? ' readonly ' : '';
}

function printValue(string $url, mixed $data, string $field): void
{
    $operacaoAdicionar = isContatosAdicionar($url) || isLugaresAdicionar($url);

    echo !$operacaoAdicionar ? " value='{$data[$field]}' " : '';
}

function printInputEssentials(string $url, mixed $data, string $field): void
{
    printInputClass($url);
    printAttrReadOnly($url);
    printValue($url, $data, $field);
}

function printAttrChecked(string $url, mixed $data, string $field, mixed $radioValue, bool $firstRadio = false): void
{
    $operacaoAdicionar = isContatosAdicionar($url) || isLugaresAdicionar($url);

    if ($operacaoAdicionar) {
        if ($firstRadio)
            echo ' checked ';
        return;
    }

    echo $data[$field] === $radioValue ? ' checked ' : '';
}
