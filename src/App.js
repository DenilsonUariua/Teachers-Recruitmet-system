import React from "react";
import { Header, Footer } from "@controls";
import { LoginForm, SignupForm } from "@auth";
import { Text, Anchor, Grid, Box } from "grommet";
import { FacebookOption, Instagram, Twitter } from "grommet-icons";
import PocketBase from "pocketbase";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import { Link } from "react-router-dom";

const client = new PocketBase("http://127.0.0.1:8090");

async function fetchValues() {
  // admin authentication via email/pass
  const adminAuthData = await client.admins.authViaEmail(
    "namutenya.ch@gmail.com",
    "celinehaiketi"
  );

  // alternatively you can also fetch all records at once via getFullList:
  const records = await client.records.getFullList(
    "jobs",
    200 /* batch size */,
    {
      sort: "-created",
    }
  );
  // await client.users.delete('zfng4t4z7x55lq4');
  localStorage.setItem("token", adminAuthData.token);
}
const Media = () => (
  <Box direction="row" gap="xxsmall" justify="center">
    <Anchor
      a11yTitle="Share feedback on Github"
      href="https://www.instagram.com/"
      icon={<Instagram color="white" />}
    />
    <Anchor
      a11yTitle="Chat with us on Slack"
      href="https://www.facebook.com/"
      icon={<FacebookOption color="white" />}
    />
    <Anchor
      a11yTitle="Follow us on Twitter"
      href="https://twitter.com/"
      icon={<Twitter color="white" />}
    />
  </Box>
);
const App = () => {
  fetchValues();
  return (
    <Router>
      <Header />
      <Routes>
        <Route path="/" element={<LoginForm />} />
        <Route path="/signin" element={<LoginForm />} />
        <Route path="/signup" element={<SignupForm />} />
        <Route path="/signin" element={<LoginForm />} />
        <Route path="/signin" element={<LoginForm />} />
        <Route path="/about" element={<LoginForm />} />
      </Routes>
      <Footer background="brand" pad="medium">
        <Media />
        <Text>Copyright@NamEduHire</Text>
        <Link to={"/about"}>
          <Anchor label="About" />
        </Link>
        <Link to={"/contact"}>
          <Anchor label="Contact Us" />
        </Link>
        <Link to={"/jobs"}>
          <Anchor label="Jobs" />
        </Link>
        <Link to={"/"}>
          <Anchor label="Home" />
        </Link>
      </Footer>
    </Router>
  );
};

export default App;
