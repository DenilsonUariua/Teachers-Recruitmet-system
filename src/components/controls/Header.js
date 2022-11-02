import React from "react";
import {
  Box,
  Button,
  Collapsible,
  Heading,
  Grommet,
  Layer,
  ResponsiveContext,
  Anchor
} from "grommet";
import { FormClose, Notification } from "grommet-icons";
import { Link } from "react-router-dom";

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

const AppBar = props => (
  <Box
    tag="header"
    direction="row"
    align="center"
    justify="between"
    background="brand"
    pad={{ left: "medium", right: "small", vertical: "small" }}
    elevation="medium"
    style={{ zIndex: "1" }}
    {...props}
  />
);

const unauthenticatedNavLinks = ["About", "Contact", "Signin", "Signup"];
const authenticatedNavLinks = [
  "About",
  "Jobs",
  "Find Jobs",
  "Contact",
  "Logout"
];

export const Header = () => {
  const [showSidebar, setShowSidebar] = React.useState(false);

  return (
    <Grommet theme={theme}>
      <ResponsiveContext.Consumer>
        {size => (
          <Box fill>
            <AppBar>
              <Heading level="3" margin="none">
                NamEduHire
              </Heading>
              {unauthenticatedNavLinks.map(navLink => (
                <Link to={`/${navLink}`}>
                  <Anchor label={`${navLink}`} style={{textDecoration: 'none !important'}} />
                </Link>
              ))}
              <Button
                icon={<Notification />}
                onClick={() => setShowSidebar(!showSidebar)}
              />
            </AppBar>
            <Box direction="row" flex overflow={{ horizontal: "hidden" }}>
              {!showSidebar || size !== "small" ? (
                <Collapsible direction="horizontal" open={showSidebar}>
                  <Box
                    flex
                    width="medium"
                    background="light-2"
                    elevation="large"
                    align="center"
                    justify="center"
                  >
                    sidebar
                  </Box>
                </Collapsible>
              ) : (
                <Layer>
                  <Box
                    background="light-2"
                    tag="header"
                    justify="end"
                    align="center"
                    direction="row"
                  >
                    <Button
                      icon={<FormClose />}
                      onClick={() => setShowSidebar(false)}
                    />
                  </Box>
                  <Box
                    fill
                    background="light-2"
                    align="center"
                    justify="center"
                  >
                    sidebar
                  </Box>
                </Layer>
              )}
            </Box>
          </Box>
        )}
      </ResponsiveContext.Consumer>
    </Grommet>
  );
};
