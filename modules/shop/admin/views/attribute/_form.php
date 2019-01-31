<?php
?>
<form ng-submit="submit()" class="form-horizontal" role="form">
    {{attribute}}
    <input type="hidden"  ng-init="attribute.entity_type_id=4">
    <div class="form-group">
        <legend>{{page_title}}</legend>

    </div>

    <!--    <div class="form-group">-->
    <!--        <label for="attribute_set" class="col-sm-2 control-label">Attribute Set</label>-->
    <!--        <div class="col-sm-10 col-md-10">-->
    <!--            <select class="form-control" id="attribute_set" ng-model="product.attribute_set_id">-->
    <!--                <option ng-repeat="attribute_set in attribute_sets" value="{{attribute_set.attribute_set_id}}">{{attribute_set.attribute_set_name}}</option>-->
    <!--            </select>-->
    <!--        </div>-->
    <!--    </div>-->

    <div class="card">
        <div class="card-header">
            <?= Yii::t('app','Attribute Properties') ?>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="frontend_label" class="col-sm-4 col-md-4 control-label">Default Label</label>
                <div class="col-sm-10 col-md-10">
                    <input class="form-control" id="frontend_label" ng-model="attribute.frontend_label">
                </div>
            </div>

            <div class="form-group">
                <label for="frontend_input" class="col-sm-12 col-md-12 control-label">Input Type</label>
                <div class="col-sm-4 col-md-4">
                    <select id="frontend_input" name="frontend_input" class="form-control"
                            ng-model="attribute.frontend_input" ng-init="attribute.frontend_input='text'">
                        <option value="text">Text Field</option>
                        <option value="textarea">Text Area</option>
                        <option value="date">Date</option>
                        <option value="boolean">Yes/No</option>
                        <option value="multiselect">Multiple Select</option>
                        <option value="select">Dropdown</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="is_required" class="col-sm-12 col-md-12 control-label">Values Required</label>
                <div class="col-sm-4 col-md-4">
                    <select id="is_required" name="is_required" class="form-control" ng-model="attribute.is_required" ng-init="attribute.is_required='0'">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="attribute_code" class="col-sm-12 col-md-12 control-label">Attribute Code</label>
                <div class="col-sm-4 col-md-4">
                    <input id="attribute_code" name="attribute_code" class="form-control"
                           ng-model="attribute.attribute_code">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card" ng-show="attribute.frontend_input === 'select' || attribute.frontend_input === 'multiselect'">
        <div class="card-header">Manage Options (Values of Your Attribute)</div>
        <div class="card-body">
            <div ng-repeat="(index,option) in attribute.options" class="input-group mb-3">
                <input type="text" class="form-control" ng-model="option.name">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" ng-click="removeOption(index)">Remove</button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="button" ng-click="addOption()">Button</button>
        </div>
    </div>
</form>
