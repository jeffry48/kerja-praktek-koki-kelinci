/* AM I BEING BANNED??? */
TRUNCATE s_permissions;
INSERT INTO s_permissions (banned_page_name) VALUES 

('manage_warehouse'),
('add_warehouse'),
('superedit_warehouse'),
('edit_warehouse'),
('delete_warehouse'),
('view_warehouse'),

('manage_hsg_principal'),
('add_hsg_principal'),
('superedit_hsg_principal'),
('edit_hsg_principal'),
('delete_hsg_principal'),
('view_hsg_principal'),

('manage_hsg_product'),
('add_hsg_product'),
('superedit_hsg_product'),
('edit_hsg_product'),
('delete_hsg_product'),
('view_hsg_product'),

('manage_hsg_product_in'),
('add_hsg_product_in'),
('superedit_hsg_product_in'),
('edit_hsg_product_in'),
('delete_hsg_product_in'),
('view_hsg_product_in'),

('manage_hsg_product_out'),
('add_hsg_product_out'),
('superedit_hsg_product_out'),
('edit_hsg_product_out'),
('delete_hsg_product_out'),
('view_hsg_product_out'),

('manage_isg_principal'),
('add_isg_principal'),
('superedit_isg_principal'),
('edit_isg_principal'),
('delete_isg_principal'),
('view_isg_principal'),

('manage_isg_product'),
('add_isg_product'),
('superedit_isg_product'),
('edit_isg_product'),
('delete_isg_product'),
('view_isg_product'),

('manage_isg_product_in'),
('add_isg_product_in'),
('superedit_isg_product_in'),
('edit_isg_product_in'),
('delete_isg_product_in'),
('view_isg_product_in'),

('manage_isg_product_out'),
('add_isg_product_out'),
('superedit_isg_product_out'),
('edit_isg_product_out'),
('delete_isg_product_out'),
('view_isg_product_out'),

('manage_user'),
('add_user'),
('superedit_user'),
('edit_user'),
('delete_user'),
('view_user'),

('report_hsg_product_name'),
('report_isg_product_name'),
('report_all_product_name'),
('report_product_name'),
('report_hsg_serial_number'),
('report_isg_serial_number'),
('report_all_serial_number'),
('report_serial_number'),

('manage_backup_restore'),
('manage_log');