import React from "react";


import { Anchor, Box, grommet, Grommet } from "grommet";
const theme = {
  global: {
    colors: {
      brand: "#2a2f33"
    },
    font: {
      family: "Roboto",
      size: "14px",
      height: "20px"
    }
  }
};



export const Footer = ({ ...rest }) => {
  return (
    <Grommet theme={theme}>
      <Box
        as="footer"
        align="center"
        direction="row"
        flex={false}
        gap="medium"
        justify="center"
        {...rest}
      />
    </Grommet>
  );
};
