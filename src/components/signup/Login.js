import React, { useState } from "react";
import { Formik } from "formik";
import {
  grommet,
  Box,
  Button,
  Grommet,
  FormField,
  Heading,
  Select,
  TextArea,
  TextInput
} from "grommet";

export const LoginForm = () => {
  const [submitted, setSubmitted] = useState(false);

  return (
    <Grommet theme={grommet}>
      <Box align="center">
        <Box width="medium" margin="large">
          <Heading>Login</Heading>
          <Formik
            initialValues={{
              username: "",
              password: ""
            }}
            validate={values => {
              const errors = {};
              if (!values.username) {
                errors.name = "required";
              }
              return errors;
            }}
            validateOnBlur={submitted}
            validateOnChange={submitted}
            onSubmit={(values, { setSubmitting }) => {
              // whatever submitting the form should entail
              alert("Submitting\n" + JSON.stringify(values, null, 2));
              setSubmitting();
            }}
          >
            {({
              values,
              errors,
              handleChange,
              handleSubmit,
              setFieldValue
            }) => (
              <form
                onSubmit={event => {
                  event.preventDefault();
                  handleSubmit();
                }}
              >
                <FormField label="Username" error={errors.username}>
                  <TextInput
                    name="username"
                    value={values.username || ""}
                    onChange={handleChange}
                    required
                  />
                </FormField>
                <FormField label="Password" error={errors.email}>
                  <TextInput
                    name="password"
                    type="password"
                    value={values.password || ""}
                    onChange={handleChange}
                    required
                  />
                </FormField>
                <Box
                  tag="footer"
                  margin={{ top: "medium" }}
                  direction="row"
                  justify="between"
                >
                  <Button
                    style={{ backgroundColor: "#444444", color: "white" }}
                    color="white"
                    type="submit"
                    danger
                    label="Submit"
                  />
                </Box>
              </form>
            )}
          </Formik>
        </Box>
      </Box>
    </Grommet>
  );
};
