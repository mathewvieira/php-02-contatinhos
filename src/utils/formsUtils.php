<?php

function printTitle($url)
{
    if (str_contains($url, 'adicionar'))
        echo '<h4>Adicionar ' . (isContatosAdicionar($url) ? 'contato' : 'lugar') . '</h4>';

    if (str_contains($url, 'editar'))
        echo '<h4>Editar ' . (isContatosAdicionar($url) ? 'contato' : 'lugar') . '</h4>';

    if (str_contains($url, 'excluir'))
        echo '<h4>Confirmar exclusão?</h4>';
}

function printInputClass($url)
{
    $operacaoExcluir = isContatosExcluir($url) || isLugaresExcluir($url);

    $inputCssClass = "form-control mb-3 ";
    $disabledInputClass = "bg-secondary bg-opacity-10 not-allowed ";

    $classNames = $inputCssClass . ($operacaoExcluir ? $disabledInputClass : '');

    echo "class='{$classNames}'";
}

function printAttrReadOnly($url)
{
    $operacaoExcluir = isContatosExcluir($url) || isLugaresExcluir($url);

    echo $operacaoExcluir ? ' readonly ' : '';
}

function printValue($url, $data, $field)
{
    $operacaoAdicionar = isContatosAdicionar($url) || isLugaresAdicionar($url);

    echo !$operacaoAdicionar ? " value='{$data[$field]}' " : '';
}

function printInputEssentials($url, $data, $field)
{
    printInputClass($url);
    printAttrReadOnly($url);
    printValue($url, $data, $field);
}

function printAttrChecked($url, $data, $field, $radioValue, $firstRadio = false)
{
    $operacaoAdicionar = isContatosAdicionar($url) || isLugaresAdicionar($url);

    if ($operacaoAdicionar) {
        if ($firstRadio)
            echo ' checked ';
        return;
    }

    echo $data[$field] === $radioValue ? ' checked ' : '';

}
