<?php
include 'filesLogic.php';
?>

<?php foreach ($files as $file) : ?>
    <tr role="row">
        <td>
            <?php echo $file['date']; ?>
        </td>
        <td>
            <?php echo $file['time']; ?>
        </td>
        <td>
            <?php echo $file['fromaddr'] ?>
        </td>
        <td>
            <?php echo $file['name']; ?>
        </td>
        <td>
            <?php echo floor($file['size'] / 1000) . ' KB'; ?>
        </td>
        <td>
            <a href="<?php echo $file['name'] ?>" target="_blank" role="button" class="btn btn-primary" title="View Task"><i class="fa fa-eye"></i></a>
            <button name="approve" role="button" onclick="approve('<?php echo $file['fromaddr']; ?>', '<?php echo $file['name']; ?> ')" class="btn btn-success" title="Approve Task"><i class="fa fa-edit"></i></button>
            <button name="decline" role="button" onclick="decline('<?php echo $file['fromaddr']; ?>', '<?php echo $file['name']; ?> ')" class="btn btn-danger" title="Decline Task"><i class="fa fa-trash"></i></button>

        </td>
    </tr>
<?php endforeach; ?>