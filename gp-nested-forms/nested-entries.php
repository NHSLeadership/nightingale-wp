<div class="gpnf-nested-entries-container ginput_container">
    <?php
    $currentFormId = $args['field']->formId;
    $nestedFormId = $nested_form['id'];
    $formMeta = GFFormsModel::get_form_meta( $currentFormId );
    $cssClass = !empty($formMeta['fields'][0]->cssClass) ? $formMeta['fields'][0]->cssClass : null;
    ?>
    <?php if ($cssClass == 'accordion') : ?>

        <fieldset class="gpnf-nested-entries c-form-region u-padding-small is-active">

            <div data-bind="visible: entries().length > 0, foreach: entries">
                <div data-bind="attr: { 'data-entryid': id }">
                    <?php foreach( $nested_fields as $nested_field ): ?>
                        <details class="gpnf-field-<?php echo $nested_field['id']; ?>" open>
                            <summary><?php echo GFCommon::get_label( $nested_field ); ?></summary>
                            <div class="gpnf-field"
                                 data-bind="html: f<?php echo $nested_field['id']; ?>.label, attr: { 'data-value': f<?php echo $nested_field['id']; ?>.label }"
                                 data-heading="<?php echo GFCommon::get_label( $nested_field ); ?>">
                                <img class="gravityflow-spinner" src="<?php echo GFCommon::get_base_url();?>/images/spinner.gif" style="border:none; outline: none;" />
                            </div>
                        </details>
                    <?php endforeach; ?>

                    <?php if (count($nested_fields)) : ?>
                        <ul class="c-form-list gpnf-row-actions">
                            <li class="u-margin-right">
                                <a class="edit" href="#" data-bind="click: $parent.editEntry"><?php echo $labels['edit_entry']; ?></a>
                            </li>
                            <li>
                                <a class="delete" href="#" data-bind="click: $parent.deleteEntry"><?php echo $labels['delete_entry']; ?></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <div data-bind="visible: entries().length <= 0">
                <div class="gpnf-no-entries" data-bind="visible: entries().length <= 0">
                    <?php echo $labels['no_entries']; ?>
                </div>
            </div>

        </fieldset>

    <?php else : ?>

        <table class="gpnf-nested-entries">

            <thead>
            <tr>
                <?php foreach( $nested_fields as $nested_field  ): ?>
                    <th class="gpnf-field-<?php echo $nested_field['id']; ?>">
                        <?php echo GFCommon::get_label( $nested_field ); ?>
                    </th>
                <?php endforeach; ?>
                <th class="gpnf-row-actions">&nbsp;</th>
            </tr>
            </thead>

            <tbody data-bind="visible: entries().length > 0, foreach: entries">
            <tr data-bind="attr: { 'data-entryid': id }">
                <?php foreach( $nested_fields as $nested_field ): ?>
                    <td class="gpnf-field"
                        data-bind="html: f<?php echo $nested_field['id']; ?>.label, attr: { 'data-value': f<?php echo $nested_field['id']; ?>.label }"
                        data-heading="<?php echo GFCommon::get_label( $nested_field ); ?>"
                    >&nbsp;</td>
                <?php endforeach; ?>
                <td class="gpnf-row-actions">
                    <ul>
                        <li class="edit"><a href="#" data-bind="click: $parent.editEntry"><?php echo $labels['edit_entry']; ?></a></li>
                        <li class="delete"><a href="#" data-bind="click: $parent.deleteEntry"><?php echo $labels['delete_entry']; ?></a></li>
                    </ul>
                </td>
            </tr>
            </tbody>

            <tbody data-bind="visible: entries().length <= 0">
            <tr class="gpnf-no-entries" data-bind="visible: entries().length <= 0">
                <td colspan="<?php echo $column_count; ?>">
                    <?php echo $labels['no_entries']; ?>
                </td>
            </tr>
            </tbody>

        </table>

    <?php endif; ?>

	<?php echo $add_button; ?>
	<?php echo $add_button_message; ?>

</div>
