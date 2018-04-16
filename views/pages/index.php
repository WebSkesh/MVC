
<h3>page/index.php</h3>

<?

foreach($data['pages'] as $page_data) { ?>

    <div style="margin-top: 20px;">
        <a href="<?= BASE ?>/pages/view/<?=$page_data['alias']?>"><?=$page_data['title']?></a>
    </div>

<?
}
?>

<h3> Footer <?= $data['test'] ?> </h3>
