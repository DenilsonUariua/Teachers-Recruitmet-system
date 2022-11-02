import { SmileOutlined } from '@ant-design/icons';
import { Button, notification } from 'antd';
import React from 'react';

export const openNotification = (title, message) => {
  notification.open({
    message: title,
    description:
     message,
    icon: <SmileOutlined style={{ color: '#108ee9' }} />,
  });
};