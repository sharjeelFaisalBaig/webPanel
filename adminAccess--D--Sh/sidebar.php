<style>
    .mt-11R {
        margin-top: 11rem;
    }

    .text-red {
        color: red;
    }
</style>
<?php
function getRownumber($tableName)
{
    require('./api/utility/connection.php');
    $getSql = 'SELECT * FROM `' . $tableName . '` WHERE 1';
    $getSqlAction = mysqli_query($conn, $getSql);
    if (mysqli_num_rows($getSqlAction) > 0) {
        return mysqli_num_rows($getSqlAction);
    } else {
        return null;
    }
}
?>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content supplyMargin">
            <ul>
                <li class="label">Control Menu</li>
                <li><a href="home"><i class="ti-home"></i> Home</a></li>
                <li><a href="callbacks"><i class="fas fa-phone mr-2"></i> Callbacks <span class="badge badge-primary"><?php echo getRownumber('callbacks'); ?></span></a></li>
                <li><a href="qoutations"><i class="ti-download"></i> Qoutation Requests <span class="badge badge-primary"><?php echo getRownumber('orders'); ?></span> <?php // if(getRownumber('orders') > 0){ echo '<i class="fa fa-fire mr-2 text-red"></i>'; }; 
                                                                                                                                                                        ?></a>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Users <span class="sidebar-collapse-icon ti-angle-down"></span> <span class="badge badge-primary"><?php echo getRownumber('users'); ?></span></a>
                    <ul>
                        <li><a href="users">See <?php if ($_SESSION['userRoleNum'] >= 3) {
                                                    echo ' / Edit';
                                                } ?> Users <span class="badge badge-primary"><?php echo getRownumber('users'); ?></span></a></li>
                        <?php
                        if ($_SESSION['userRoleNum'] >= 3) {
                        ?>
                            <li><a href="new-user">Add Users</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="discussions"><i class="fas fa-comments mr-2"></i> Discussions <span class="badge badge-primary"><?php echo getRownumber('discussion'); ?></span></a></li>
                <!-- <li><a href="javascript:;" class="editBanner"><i class="fas fa-ad mr-2"></i> Discount Banner</span></a></li> -->
                <li><a class="logout"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>